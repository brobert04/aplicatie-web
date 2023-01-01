<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function showCategories(){
         $category = Category::all()->sortBy('title');
        return view('admin.category.categories', ['categories' => $category]);
    }

    public function newCategoryForm(){
        return view('admin.category.new-category');
    }

    public function createCategory(CreateCategoryRequest $request){
        $category = new Category();
        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->slug = Str::slug($request->slug);
        $category->excerpt = $request->excerpt;


//        $category->order = $request->order;
//        $category->public = $request->public;

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
}
