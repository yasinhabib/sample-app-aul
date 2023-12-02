<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FinanceController;
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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processLogin');

Route::get('/403',function(){
    return view('403');
})->name('403');

Route::middleware('auth')->group(function(){
    Route::get('/',function(){
        return view('welcome');
    })->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['role:1'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user-index');
        Route::get('/user/add', [UserController::class, 'addForm'])->name('user-form-add');
        Route::post('/user/create', [UserController::class, 'create'])->name('user-create');
        Route::get('/user/edit/{id}', [UserController::class, 'editForm'])->name('user-form-edit');
        Route::post('/user/update', [UserController::class, 'update'])->name('user-update');
        Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user-delete');
        
        Route::get('/menu', [MenuController::class, 'index'])->name('menu-index');
        Route::get('/menu/add', [MenuController::class, 'addForm'])->name('menu-form-add');
        Route::post('/menu/create', [MenuController::class, 'create'])->name('menu-create');
        Route::get('/menu/edit/{id}', [MenuController::class, 'editForm'])->name('menu-form-edit');
        Route::post('/menu/update', [MenuController::class, 'update'])->name('menu-update');
        Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu-delete');

        Route::get('/role', [RoleController::class, 'index'])->name('role-index');
        Route::get('/role/add', [RoleController::class, 'addForm'])->name('role-form-add');
        Route::post('/role/create', [RoleController::class, 'create'])->name('role-create');
        Route::get('/role/edit/{id}', [RoleController::class, 'editForm'])->name('role-form-edit');
        Route::post('/role/update', [RoleController::class, 'update'])->name('role-update');
        Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role-delete');
        Route::get('/role/access-menu/{id}', [RoleController::class, 'accessMenuForm'])->name('role-form-access-menu');
        Route::post('/role/save-access-menu', [RoleController::class, 'saveAccessMenu'])->name('save-role-form-access');
    });

    Route::middleware(['role:2'])->group(function () {
        Route::get('/product', [ProductController::class, 'index'])->name('product-index');
        Route::get('/product/add', [ProductController::class, 'addForm'])->name('product-form-add');
        Route::post('/product/create', [ProductController::class, 'create'])->name('product-create');
        Route::get('/product/edit/{id}', [ProductController::class, 'editForm'])->name('product-form-edit');
        Route::post('/product/update', [ProductController::class, 'update'])->name('product-update');
        Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product-delete');
    });

    Route::middleware(['role:3'])->group(function () {
        Route::get('/finance', [FinanceController::class, 'index'])->name('finance-index');
        Route::get('/finance/edit/{id}', [FinanceController::class, 'editForm'])->name('finance-form-edit');
        Route::post('/finance/update', [FinanceController::class, 'update'])->name('finance-update');
    });
});
