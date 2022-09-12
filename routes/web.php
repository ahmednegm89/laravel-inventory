<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\pos\UnitController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\pos\ProductController;
use App\Http\Controllers\pos\CategoryController;
use App\Http\Controllers\pos\CustomerController;
use App\Http\Controllers\pos\DefaultController;
use App\Http\Controllers\pos\PurchaseController;
use App\Http\Controllers\pos\SupplierController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


// Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// suppliers All Routes 
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all')->middleware('auth');
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add')->middleware('auth');
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store')->middleware('auth');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit')->middleware('auth');
    Route::post('/supplier/update/{id}', 'SupplierUpdate')->name('supplier.update')->middleware('auth');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete')->middleware('auth');
});

// customers All Routes 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all')->middleware('auth');
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add')->middleware('auth');
    Route::post('/customer/store', 'CustomerStore')->name('customer.store')->middleware('auth');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit')->middleware('auth');
    Route::post('/customer/update/{id}', 'CustomerUpdate')->name('customer.update')->middleware('auth');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete')->middleware('auth');
});

// units All Routes 
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all')->middleware('auth');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add')->middleware('auth');
    Route::post('/unit/store', 'UnitStore')->name('unit.store')->middleware('auth');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit')->middleware('auth');
    Route::post('/unit/update/{id}', 'UnitUpdate')->name('unit.update')->middleware('auth');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete')->middleware('auth');
});

// categories All Routes 
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'CategoryAll')->name('category.all')->middleware('auth');
    Route::get('/category/add', 'CategoryAdd')->name('category.add')->middleware('auth');
    Route::post('/category/store', 'CategoryStore')->name('category.store')->middleware('auth');
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit')->middleware('auth');
    Route::post('/category/update/{id}', 'CategoryUpdate')->name('category.update')->middleware('auth');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete')->middleware('auth');
});

// products All Routes 
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all')->middleware('auth');
    Route::get('/product/add', 'ProductAdd')->name('product.add')->middleware('auth');
    Route::post('/product/store', 'ProductStore')->name('product.store')->middleware('auth');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit')->middleware('auth');
    Route::post('/product/update/{id}', 'ProductUpdate')->name('product.update')->middleware('auth');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete')->middleware('auth');
});

// purchases All Routes 
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all')->middleware('auth');
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add')->middleware('auth');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store')->middleware('auth');
    Route::get('/purchase/edit/{id}', 'PurchaseEdit')->name('purchase.edit')->middleware('auth');
    Route::post('/purchase/update/{id}', 'PurchaseUpdate')->name('purchase.update')->middleware('auth');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete')->middleware('auth');
});

// default All Routes 
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category')->middleware('auth');
    Route::get('/get-product', 'GetProduct')->name('get-product');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
