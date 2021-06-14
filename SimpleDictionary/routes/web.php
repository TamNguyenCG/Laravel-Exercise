<?php

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

Route::get('/', function () {
    return view('dictionary_form');
});

Route::post('/translate',function (\Illuminate\Http\Request $request){
    $array= [
        'English' => 'Tieng Anh',
        'Spain' => 'Tieng Tay Ban Nha',
        'Vietnamese' => 'Tieng Viet'
    ];
    $search = $request->search;
    foreach ($array as $key => $item){
        if($search === $key){
            return view ('translate',compact('key','item'));
        }
    };
    return view('wrong');
});
