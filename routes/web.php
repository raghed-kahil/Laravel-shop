<?php

use App\Http\Controllers\Basket;
use App\Http\Controllers\Category;
use App\Http\Controllers\CostumerOrders;
use App\Http\Controllers\CustomerAccount;
use App\Http\Controllers\Register;
use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    $hotProducts = Product::query()->limit(10)->getModels();
    return view('home')
        ->with('title', 'Obaju : e-commerce template')
        ->with('hotProducts', $hotProducts);
})->name('home');

Route::get('add-pr', function () {
    $product = new Product([
        'name' => 'Black Blouse Versace',
        'color' => 1,
        'brand' => 2,
        'price' => 300,
        'sale' => 0.6,
        'img1' => '/img/product3.jpg',
        'img2' => '/img/product1_3.jpg',
        'details' => json_encode([
            'Product details' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
            'Material & care' => ['Polyester', 'Machine wash'],
            'Size & Fit' => ['Regular fit', 'The model (height 5\'8" and chest 33") is wearing a size S'],
            'note' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
        ])]);
    $product->save();
    return $product;
});

Route::get('checkout4', function () {
    return view('checkout4')
        ->with('basket', Session::get('basket', ['products' => [], 'total' => 0, 'tax' => 0, 'shipAndHandle' => 0]));
});

Route::get('/auth/email/verify', function () {
    return view('verify-email')->with('title', 'Verify');
})->middleware('auth')->name('verification.notice');

Route::get('/auth/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::resource('/products', Category::class)
    ->withoutMiddleware(VerifyCsrfToken::class)
    ->only('index', 'store');

Route::get('customer-orders', CostumerOrders::class)
    ->middleware('auth');

Route::get('customer-orders/{order}', function (Order $order) {
    if ($order->user_id != Auth::id())
        return redirect()->back();
    return view('customer-order')->with('order', $order);
});

Route::get('products/{product}', function (Product $product) {
    return view('detail')
        ->with('product', $product);
});

Route::get('register', function () {
    return view('register')
        ->with('errorLogin', Session::get('errorLogin', false));
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::resource('basket', Basket::class)->only('store', 'index', 'update');

Route::resource('customer-account', CustomerAccount::class)
    ->only('store', 'index')->middleware('auth');

Route::get('{page?}', function ($page = 'home') {
    return view($page)->with('title', 'Obaju : e-commerce template');
})
    ->where('page', '^[A-Za-z0-9-]*$');

//------------------------- post routes ---------------------------------//
Route::post('register', Register::class);

Route::post('/auth/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('login', function (Request $request) {
    //authenticate
    if (Auth::attempt([
        'email' => $request->get('email'),
        'password' => 'rdkl-sail' . $request->get('password')], true)) {
        $request->session()->regenerate();
        return redirect()->home();
    }
    return redirect('register')->with('errorLogin', true);
});

//-------------------- PUT --------------------------//

