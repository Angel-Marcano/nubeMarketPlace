<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BusinessController;


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


Route::prefix('almacen')->group(function () {
    Route::get('', [StoreController::class, 'index']);
    Route::get('get/{id}', [StoreController::class, 'get']);
    Route::post('create', [StoreController::class, 'post']);
    Route::post('update', [StoreController::class, 'update']);
    Route::post('delete/{id}', [StoreController::class, 'delete']);
    
});

Route::prefix('empresas')->group(function () {
    Route::get('getAll', [BusinessController::class, 'index']);
    Route::get('get/{id}', [BusinessController::class, 'get']);
    Route::post('create', [BusinessController::class, 'post']);
    Route::post('update', [BusinessController::class, 'update']);
    Route::post('delete/{id}', [BusinessController::class, 'delete']);
});

Route::prefix('articulo')->group(function () {
    Route::get('getAll', [ArticleController::class, 'index']);
    Route::get('get/{id}', [ArticleController::class, 'get']);
    Route::post('create', [ArticleController::class, 'post']);
    Route::post('update/{id}', [ArticleController::class, 'update']);
    Route::post('delete/{id}', [ArticleController::class, 'delete']);
});

Route::prefix('category')->group(function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('get/{id}', [CategoryController::class, 'get']);
    Route::post('create', [CategoryController::class, 'post']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::post('delete/{id}', [CategoryController::class, 'delete']);
});

Route::prefix('subCategory')->group(function () {
    Route::get('{id}', [SubCategoryController::class, 'index']);
    Route::get('get/{id}', [SubCategoryController::class, 'get']);
    Route::post('create', [SubCategoryController::class, 'post']);
    Route::post('update/{id}', [SubCategoryController::class, 'update']);
    Route::post('delete/{id}', [SubCategoryController::class, 'delete']);
});