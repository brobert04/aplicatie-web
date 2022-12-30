<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategories(){
         $category = Category::all()->sortBy('title');
        return view('admin.category.categories', ['categories' => $category]);
    }

    public function newCategoryForm(){
        return view('admin.category.new-category');
    }
}
