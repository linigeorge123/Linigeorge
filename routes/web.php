<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('custom-login',[LoginController::class,'customLogin'])->name('login.custom');
Route::get('register',[RegisterController::class,'create'])->name('register.create');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('profile',[HomeController::class,'profile'])->name('profile.index');


          
			
    Route::group(['middleware' => ['permission']], function () {

        Route::get('role/create',[RoleController::class,'create'])->name('role.create');
        Route::post('role/store',[RoleController::class,'store'])->name('role.store');
        Route::get('role/index',[RoleController::class,'index'])->name('role.index');
        Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::get('role/destroy/{id}',[RoleController::class,'destroy'])->name('role.destroy');
        Route::post('role/update',[RoleController::class,'update'])->name('role.update');
    
        Route::get('user/create',[UserController::class,'create'])->name('user.create');
        Route::post('user/store',[UserController::class,'store'])->name('user.store');
        Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    
        Route::post('user/update',[UserController::class,'update'])->name('user.update');
    
        Route::get('productcategory/create',[ProductCategoryController::class,'create'])->name('productcategory.create');
        Route::get('productcategory/index',[ProductCategoryController::class,'index'])->name('productcategory.index');
        Route::post('productcategory/store',[ProductCategoryController::class,'store'])->name('productcategory.store');
    
        Route::get('product/create',[ProductController::class,'create'])->name('product.create');
        Route::get('product/index',[ProductController::class,'index'])->name('product.index');
        Route::post('product/store',[ProductController::class,'store'])->name('product.store');
        Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('product/update',[ProductController::class,'update'])->name('product.update');
        Route::get('product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
        Route::get('user/index',[UserController::class,'index'])->name('user.index');
        Route::get('permission/control/{user_id?}',[PermissionController::class,'index'])->name('permission.index');
        Route::post('permission/store',[PermissionController::class,'store'])->name('permission.store');

    });
  
    Route::group(['middleware' => ['super_admin', 'demo'], 'prefix' => 'super_admin'], function () {


    });






    


});