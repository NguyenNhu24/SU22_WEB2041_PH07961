<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ShoppingCartController;
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
    if (Auth::check()) {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('homepage');
        } elseif (Auth::user()->role_id == 2) {
            return redirect()->route('homepage');
        }
    } else {
        return redirect()->route('homepage');
    }
});


Route::get('/', [HomeController::class, 'index'])->name('homepage');

// product
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/detail_product/{slug}', [ShopController::class, 'detail_product'])->name('detail_product');
Route::post('/addcomment', [ShopController::class, 'addComment']);
Route::get('/addcart', [ShopController::class, 'addCart'])->name('addcart');

// blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/detail_blog/{slug}', [BlogController::class, 'detail_blog'])->name('detail_blog');
Route::post('/addblogcomment', [BlogController::class, 'addPostComment']);

// contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// login
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::any('logout', function(){
    Auth::logout();
    return redirect(route('index'));
})->name('logout');

//cart
Route::get('/cart', [ShoppingCartController::class, 'listCart'])->name('cart.index');
Route::get('/{id}/remove', [ShoppingCartController::class, 'removeClientdminCart'])->name('cart.remove');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
