<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboradController;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentController;
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

// Route::get('/admin/dashboard', [DashboradController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['middleware' => 'verify.admin'], function () {
Route::prefix('dashboard')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [DashboradController::class, 'dashboard'])->name('admin.dashboard');
    });

//categories
Route::prefix('category')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/add', [CategoryController::class, 'add'])->name('category.add-cate');
        Route::post('/add', [CategoryController::class, 'saveAdd'])->name('category.save');
        Route::get('/{id}/remove', [CategoryController::class, 'remove'])->name('category.remove');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{Category}', [CategoryController::class, 'update'])->name('category.update');
    });

// brand
Route::prefix('brand')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/add', [BrandController::class, 'add'])->name('brand.add');
        Route::post('/add', [BrandController::class, 'saveAdd'])->name('brand.save');
        Route::get('/{id}/remove', [BrandController::class, 'remove'])->name('brand.remove');
        Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
    });

Route::prefix('users')
    ->middleware('auth')
    ->group( function(){
        Route::get('/',[UserController::class, 'index'])->name('users.index');
        Route::get('add',[UserController::class, 'add'])->name('users.add');
        Route::post('add',[UserController::class, 'saveAdd']);
        Route::get('edit/{id}',[UserController::class, 'edit'])->name('users.edit');
        Route::post('edit/{id}',[UserController::class, 'saveEdit']);
        Route::get('{id}/remove',[UserController::class, 'remove'])->name('users.remove');
});

//products
Route::prefix('product')
    ->middleware('auth')
    ->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::get('/add', [ProductController::class, 'add'])->name('product.add-product');
        Route::post('/add', [ProductController::class, 'saveAdd'])->name('product.save');
        Route::get('/{id}/remove', [ProductController::class, 'remove'])->name('product.remove');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    });
//post
Route::prefix('post')
    ->middleware('auth')
    ->group(function () {
        Route::get('', [PostController::class, 'index'])->name('post.index');
        Route::get('/add', [PostController::class, 'add'])->name('post.add-post');
        Route::post('/add', [PostController::class, 'saveAdd']);
        Route::get('/{id}/remove', [PostController::class, 'remove'])->name('post.remove');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
    });

Route::prefix('comment')
    ->middleware('auth')
    ->group(function () {
        Route::get('', [CommentController::class, 'index'])->name('comment.index');
        Route::get('/{id}/remove', [CommentController::class, 'remove'])->name('comment.remove');

    });
    Route::prefix('commentblog')
    ->middleware('auth')
    ->group(function () {
        Route::get('', [PostCommentController::class, 'index'])->name('commentblog.index');
        Route::get('/{id}/remove', [PostCommentController::class, 'remove'])->name('commentblog.remove');

    });

Route::prefix('cart')
    ->middleware('auth')
    ->group(function () {
        Route::get('', [ShoppingCartController::class, 'indexAdmin'])->name('cartadmin.index');
        Route::get('/{id}/remove', [ShoppingCartController::class, 'removeAdminCart'])->name('cartadmin.remove');

    });

});



//Login
Route::view('login', 'auth.login')->name('login');
Route::post('login', [LoginController::class, 'stopLogin']);

//Logout
Route::any('logout', function () {
    Auth::logout();
    return redirect(route('homepage'));
})->name('logout');
