<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view){
        $view->with('sections', Category::all()->sortByDesc('views')->where('publish', 1));
    }
}
