<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RolesController;

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
    Route::post('update/{id}', [StoreController::class, 'update']);
    Route::post('delete/{id}', [StoreController::class, 'delete']);
    
});

Route::prefix('empresas')->group(function () {
    Route::get('getAll', [BusinessController::class, 'index']);
    Route::get('get/{id}', [BusinessController::class, 'get']);
    Route::post('create', [BusinessController::class, 'post']);
    Route::post('update/{id}', [BusinessController::class, 'update']);
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

Route::prefix('cliente')->group(function () {
    Route::get('', [ClientController::class, 'index']);
    Route::get('get/{id}', [ClientController::class, 'get']);
    Route::post('create', [ClientController::class, 'post']);
    Route::post('update/{id}', [ClientController::class, 'update']);
    Route::post('delete/{id}', [ClientController::class, 'delete']);
    
});

Route::prefix('roles')->group(function () {
    Route::get('', [RolesController::class, 'index']);
    
});