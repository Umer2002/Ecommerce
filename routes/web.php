<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\frontend\ReviewController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\frontend\FrontendController::class, 'index'])->name('welcome');

Route::get('category_products', [App\Http\Controllers\frontend\FrontendController::class, 'category_products'])->name('category_products');

Route::get('view_category/{id}', [App\Http\Controllers\frontend\FrontendController::class, 'view_category'])->name('view_category');

Route::get('cate/{cate_id}/{prod_id}', [App\Http\Controllers\frontend\FrontendController::class, 'cate'])->name('cate');

Route::get('product_list', [App\Http\Controllers\frontend\FrontendController::class, 'product_list'])->name('product_list');

Route::post('searchproduct', [App\Http\Controllers\frontend\FrontendController::class, 'searchproduct'])->name('searchproduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add_to_cart',[App\Http\Controllers\frontend\CartController::class, 'add_to_cart'])->name('add_to_cart');

Route::post('add_to_wishlist', [App\Http\Controllers\frontend\WishlistController::class,'add_to_wishlist'])->name('add_to_wishlist');

Route::post('remove_cart_item',[App\Http\Controllers\frontend\WishlistController::class,'remove_cart_item'])->name('remove_cart_item');

Route::post('proceed_pay',[App\Http\Controllers\frontend\CheckoutController::class,'proceed_pay'])->name('proceed_pay');

Route::middleware(['auth'])->group(function (){
    Route::get('cart_show', [App\Http\Controllers\frontend\CartController::class,'cart_show'])->name('cart_show');

    Route::post('delete_item',[App\Http\Controllers\frontend\CartController::class, 'delete_item'])->name('delete_item');

    Route::post('update_cart',[App\Http\Controllers\frontend\CartController::class, 'update_cart'])->name('update_cart');

    Route::get('checkout', [App\Http\Controllers\frontend\CheckoutController::class,'checkout'])->name('checkout');

    Route::post('place_order', [App\Http\Controllers\frontend\CheckoutController::class,'place_order'])->name('place_order');

    Route::get('my_orders', [App\Http\Controllers\frontend\UserController::class,'my_orders'])->name('my_orders');
    

    Route::get('view_order/{id}', [App\Http\Controllers\frontend\UserController::class,'view_order'])->name('view_order');

    Route::get('wish_list', [App\Http\Controllers\frontend\WishlistController::class,'wish_list'])->name('wish_list');

    Route::post('add_rating', [App\Http\Controllers\frontend\RatingController::class,'add_rating'])->name('add_rating');

    Route::get('add_review/{product_id}/userreview', [App\Http\Controllers\frontend\ReviewController::class,'add_review'])->name('add_review');

    Route::post('review', [App\Http\Controllers\frontend\ReviewController::class,'review'])->name('review');

    Route::get('edit_review/{product_id}/userreview', [App\Http\Controllers\frontend\ReviewController::class,'edit_review'])->name('edit_review');

    Route::put('eupdate_review',[App\Http\Controllers\frontend\ReviewController::class,'update_review'])->name('update_review');

});

Route::middleware(['auth', 'isadmin'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Admin\FrontendController::class,'index'])->name('dashboard');

    Route::get('categories',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('categories');

    Route::get('add',[App\Http\Controllers\Admin\CategoryController::class,'add'])->name('add');
    
    Route::post('add_category',[App\Http\Controllers\Admin\CategoryController::class,'add_category'])->name('add_category');

    Route::post('update_cate',[App\Http\Controllers\Admin\CategoryController::class,'update_cate'])->name('update_cate');

    Route::get('edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('edit');

    Route::get('delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('delete');

    Route::get('add_products',[App\Http\Controllers\Admin\ProductsController::class,'add_products'])->name('add_products');

    Route::post('add_productsdata',[App\Http\Controllers\Admin\ProductsController::class,'add_productsdata'])->name('add_productsdata');

    Route::get('products',[App\Http\Controllers\Admin\ProductsController::class,'products'])->name('products');

    Route::get('deleteproduct/{id}',[App\Http\Controllers\Admin\ProductsController::class,'deleteproduct'])->name('deleteproduct');

    Route::get('update_products/{id}',[App\Http\Controllers\Admin\ProductsController::class,'update_products'])->name('update_products');

    Route::post('edit_products',[AppHttp\Controllers\Admin\ProductsController::class,'edit_products'])->name('edit_products');

    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class,'orders'])->name('orders');

    Route::get('admin_view_order/{id}',[App\Http\Controllers\Admin\OrderController::class,'admin_view_order'])->name('admin_view_order');

    Route::put('update_order/{id}',[App\Http\Controllers\Admin\OrderController::class,'update_order'])->name('update_order');

    Route::get('order_history',[App\Http\Controllers\Admin\OrderController::class,'order_history'])->name('order_history');
    
    Route::get('users',[App\Http\Controllers\Admin\DashboardController::class,'users'])->name('users');

    Route::get('user_view/{id}',[App\Http\Controllers\Admin\DashboardController::class,'user_view'])->name('user_view');
});
