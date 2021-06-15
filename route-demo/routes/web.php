<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/about',function (){
    echo ("<h2>this is About page</h2>");
});

Route::get('/contact',function (){
   echo ("<h2>this is Contact page</h2>");
});

Route::get('/user/{name?}',function ($name = 'TamNguyen'){
    echo "<h1>User name is $name</h1>";
});

Route::get('/',[HomeController::class,'index']);
