<?php
use App\Http\Middleware\CheckLogin;

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

Route::get('/', 'ProductController@index');
Route::get('/cart/list', 'CartController@index')->name('cart.list')->middleware('web');
Route::get('/cart/create/{id}', 'CartController@create')->name('cart.create');
Route::get('/cart/empty', 'CartController@empty')->name('cart.empty');
Route::get('/cart/remove/{rowId}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/update/{rowId}', 'CartController@update')->name('cart.update');
Route::get('/signup', 'UserController@getSignUp');
Route::post('/signup', 'UserController@signUp')->name('signup');
Route::get('/logout', 'UserController@logout');
Route::get('/signin', 'UserController@getSignIn');
Route::post('/signin', 'UserController@signIn')->name('signin');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware(CheckLogin::class);
Route::post('/checkout/store', 'CheckoutController@store')->name('checkout.store');
Route::get('/checkout/store/{alamat}', 'CheckoutController@store1')->name('checkout.store1');

Route::post('/profile', 'UserController@updateProfile')->name('profile');
Route::get('/profile', 'UserController@profile')->name('customer.profile');

Route::get('login/facebook', 'UserController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'UserController@handleProviderCallback');

Route::get('/about', function() {
    return view('about');
});