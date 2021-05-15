<?php

use App\Http\Controllers\registerController;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('home')->with('title','Obaju : e-commerce template');
//});

Route::get('{page?}', function ($page = 'home') {
    return view($page)->with('title','Obaju : e-commerce template');
})
    ->where('page','[A-Za-z0-9-]*');

Route::post('register', registerController::class);
Route::post('login', registerController::class);
