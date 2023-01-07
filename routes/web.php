<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UsersController;
use \App\Http\Controllers\Admin\UserProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//======RUTELE PUBLICE=====
Route::get('/', function () {
    return view('frontend_views.home');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin.control-panel');
})->middleware(['auth', 'verified'])->name('dashboard');


//====Rutele administratorului====
Route::prefix('admin')->middleware(['admin'])->group(function(){
    Route::get('users', [UsersController::class, 'showUsers'])->name('users');
    Route::get('new-user', [UsersController::class, 'newUser'])->name('users.name');
    Route::post('new-user', [UsersController::class, 'createUser'])->name('users.create');
    Route::get('edit-user/{id}', [UsersController::class, 'editUserForm'])->name('users.edit-form');
    Route::put('edit-user/{id}', [UsersController::class, 'editUser'])->name('users.edit');
    Route::delete('delete-user/{id}', [UsersController::class, 'deleteUser'])->name('users.delete');
});
//=================

//=========Rutele pentru categorii ale adminului===========
Route::middleware(['auth', 'verified'])->group(function(){
   Route::get('categories', [\App\Http\Controllers\Admin\CategoryController::class, 'showCategories'])->name('categories');
   Route::get('categories/new', [\App\Http\Controllers\Admin\CategoryController::class,'newCategoryForm'])->name('categories.new');
   Route::post('categories/new', [\App\Http\Controllers\Admin\CategoryController::class,'createCategory'])->name('categories.create');
   Route::get('categories/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'editCategoryForm'])->name('categories.edit-form');
   Route::put('categories/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'editCategory'])->name('categories.edit');
   Route::delete('categories/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class,'deleteCategory'])->name('categories.delete');
});

//======Rutele utilizatorului========
Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){
    Route::get('profile/', [UserProfile::class, 'showProfile'])->name('user.profile');
    Route::put('edit-user-profile', [UserProfile::class, 'editUser'])->name('users.edit-profile');
//  ====Ruta resetare parola=====
    Route::put('reset-password', [UserProfile::class, 'resetPassword'])->name('users.reset-password');
});


Route::view('/forgot-password', 'auth.forgot-password')->middleware('guest')->name('password.request');
require __DIR__.'/auth.php';
