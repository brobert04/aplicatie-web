<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
//        $sections = Category::all()->sortByDesc('views');
        return view('frontend_views.home');
    }

    public function categoryPage(Category $category){
        if ($category->publish==1) {
            $category->views++;
            $category->save();
            return view('frontend_views.bycategory')->with('category', $category);
        }
        else{
            abort(404);
        }
    }
}
