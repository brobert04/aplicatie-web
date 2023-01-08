<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function showCategories(){
         $category = Category::all()->sortBy('title');
        return view('admin.category.categories', ['categories' => $category]);
    }

    public function newCategoryForm(){
        if (! Gate::allows('author-rights')) {
            return redirect(route('categories'))->with('error', 'Nu aveți permisiunea de a crea o categorie!');
        }
        return view('admin.category.new-category');
    }

    public function createCategory(CreateCategoryRequest $request){
        if (! Gate::allows('author-rights')) {
            return redirect(route('categories'))->with('error', 'Nu aveți permisiunea de a crea o categorie!');
        }
        $this->validate($request,
            [
                'slug'=>'unique:categories,slug'
            ],
            [
                'slug.unique'=>'Slug-ul este deja folosit de o altă categorie!'
            ]
        );
        $category = new Category();
        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->slug = Str::slug($request->slug);
        $category->excerpt = $request->excerpt;


//        $category->order = $request->order;
        $category->publish = $request->publish;

        if($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '',$request->title) .'_' . time().'.'.$extension;
            $request->file('photo')->move('images/categories', $photo_name);
            $category->photo = $photo_name;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect(route('categories'))->withInput()->with('success', 'Categoria' .' '.$category->title. ' '. 'a fost creată cu succes!');
    }
    public function editCategoryForm($id){

        $category = Category::find($id);
        return view('admin.category.edit-category')->with('category', $category);
    }

    public function editCategory(CreateCategoryRequest $request, $id){

        $this->validate($request,
            [
                'slug'=>'unique:categories,slug,'.$id,
            ],
            [
                'slug.unique'=>'Slug-ul este deja folosit de o altă categorie!'
            ]
        );

        $category = Category::find($id);

        if($request->hasFile('photo')){
            if(!($category->photo == 'category.jpg')){
                File::delete('images/categories/'.$category->photo);
            }
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photo_name = str_replace(' ', '',$request->title) .'_' . time().'.'.$extension;
            $request->file('photo')->move('images/categories', $photo_name);
            $category->photo = $photo_name;
        }

        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->slug = Str::slug($request->slug);
        $category->excerpt = $request->excerpt;
        $category->publish = $request->publish;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect(route('categories'))->withInput()->with('success', 'Categoria' .' '.$category->title. ' '. 'a fost editată cu succes!');
    }

    public function deleteCategory($id){
        if (! Gate::allows('author-rights')) {
            return redirect(route('categories'))->with('error', 'Nu aveți permisiunea de a șterge o categorie!');
        }
        $category = Category::find($id);
        if(!($category->photo == 'category.jpg')){
            File::delete('images/categories/'.$category->photo);
        }
        $category->delete();
        return redirect(route('categories'))->withInput()->with('success', 'Categoria' .' '.$category->title. ' '. 'a fost ștearsă cu succes!');
    }
}
