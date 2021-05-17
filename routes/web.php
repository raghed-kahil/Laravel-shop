<?php

use App\Http\Controllers\registerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    return view('home')->with('title','Obaju : e-commerce template');
})->name('home')->middleware('verified');

Route::post('register', registerController::class);

Route::get('/auth/email/verify', function () {
    return view('verify-email')->with('title','Verify');
})->middleware('auth')->name('verification.notice');

Route::get('/auth/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/auth/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('login', function (Request $request){
    if (Auth::attempt($request->only(['email','password']),true)){
        $request->session()->regenerate();
        return redirect()->home();
    }
    return response($request->only(['email','password']),400);
});

Route::get('{page?}', function ($page = 'home') {
    return view($page)->with('title','Obaju : e-commerce template');
})
    ->where('page','^[A-Za-z0-9-]*$');
