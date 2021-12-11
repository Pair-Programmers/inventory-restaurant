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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//adminpanel routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Adminpanel\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\Adminpanel\DashboardrController ::class, 'index'])->name('home');

    //Expense
    Route::prefix('expense')->name('expense.')->group(function(){
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/index', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ExpenseCategoryController::class, 'destroy'])->name('destroy');
        });

        Route::get('/index', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ExpenseController::class, 'destroy'])->name('destroy');

    });

    //Product
    Route::prefix('product')->name('product.')->group(function(){
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/index', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'store'])->name('store');
            Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ProductCategoryController::class, 'destroy'])->name('destroy');
        });

        Route::get('/index', [App\Http\Controllers\Adminpanel\ProductController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\ProductController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\ProductController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\ProductController::class, 'destroy'])->name('destroy');

    });

    //Sale Invoice
    Route::prefix('sale_invoice')->name('sale_invoice.')->group(function(){

        Route::get('/index', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'store'])->name('store');
        Route::get('/show/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [App\Http\Controllers\Adminpanel\InvoiceController::class, 'destroy'])->name('destroy');

    });

});


Route::resource('user', App\Http\Controllers\Adminpanel\ExpenseCategoryController::class);

