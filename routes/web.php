<?php

use Illuminate\Support\Facades\Route;
//Danh Mục
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('admin/them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'insert_form']);
Route::post('admin/xu-ly-them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_insert']);
Route::get('admin/danh-sach-nguoi-dung',[\App\Http\Controllers\UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_update']);

//Sản phẩm
Route::get('admin/them-san-pham',[\App\Http\Controllers\ProductController::class, 'insert_form']);
Route::post('admin/xu-ly-them-san-pham',[\App\Http\Controllers\ProductController::class, 'action_insert']);
Route::get('admin/danh-sach-san-pham',[\App\Http\Controllers\ProductController::class, 'get_all']);
Route::get('admin/xoa-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'del']);
Route::get('admin/thong-tin-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-san-pham',[\App\Http\Controllers\ProductController::class, 'action_update']);


// Danh sách tất cả route cho category
Route::get('admin/danh-sach-danh-muc', [\App\Http\Controllers\CategoryController::class, 'get_all']);
Route::get('admin/insert-form', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('admin/insert-form', [\App\Http\Controllers\CategoryController::class, 'store']);
Route::get('admin/info-form/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('admin/info-form/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
Route::get('admin/xoa-danh-muc/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);

// web.php
// Thêm sản phẩm vào giỏ
Route::post('/cart/add/{id}', [UserController::class, 'addCart'])->name('users.cart.add');

// Giỏ hàng
Route::get('/cart', [UserController::class, 'cart'])->name('users.cart');

// Cập nhật số lượng
Route::post('/cart/update/{id}', [UserController::class, 'updateCart'])->name('users.cart.update');

// Xóa sản phẩm
Route::post('/cart/remove/{id}', [UserController::class, 'removeCart'])->name('users.cart.remove');




Route::get('admin/landing', [UserController::class, 'landing']);
// Hiển thị form login
Route::get('admin/login', [UserController::class, 'login']);

// Xử lý login
Route::post('admin/xu-ly-dang-nhap', [UserController::class, 'action_login']);

// Logout
Route::get('admin/logout', [UserController::class, 'logout']);

use App\Http\Controllers\UserWebsiteController;

Route::get('/users', [UserWebsiteController::class, 'index'])->name('users.index');
Route::get('/users/products', [UserWebsiteController::class, 'products'])->name('users.products');
Route::get('/users/contact', [UserWebsiteController::class, 'contact'])->name('users.contact');
Route::post('/users/contact', [UserWebsiteController::class, 'submitContact'])->name('users.contact.submit');

Route::get('/cart', [UserController::class, 'cart'])->name('users.cart');
Route::post('/cart/add/{id}', [UserController::class, 'addCart'])->name('users.cart.add');
Route::post('/cart/update/{id}', [UserController::class, 'updateCart'])->name('users.cart.update');
Route::post('/cart/remove/{id}', [UserController::class, 'removeCart'])->name('users.cart.remove');
Route::get('/checkout', [UserController::class, 'checkout'])->name('users.checkout');


Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route user products, about, contact
Route::get('/products', [HomeController::class, 'products']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

// Login/Logout user
// Hiển thị form login user
Route::get('/login', [UserController::class, 'userLoginForm'])->name('user.login');
// Xử lý đăng nhập user
Route::post('/login', [UserController::class, 'userLogin']);
Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

// Hiển thị form đăng ký
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('users.register');

// Xử lý đăng ký
Route::post('/register', [UserController::class, 'register']);

Route::get('/product/{product_id}', [ProductController::class, 'productDetail'])
     ->name('product.detail');


Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home',['title' => 'HCE', 'body' => 'Body']);
});
Route::prefix('greeting')->group(function () {

	// work for: /greeting/vn
    Route::get('vn', function () {
        return "Xin chào!";
    });

    // work for: /greeting/en
    Route::get('en', function () {
        return "Hello!";
    });

    // work for: /greeting/cn
    Route::get('cn', function () {
        return "你好!";
    });
});
Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});
Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});


