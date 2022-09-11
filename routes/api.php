<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/index', [CompanyCRUDController::class,'index']);
Route::post('/AddCompany', [CompanyCRUDController::class,'AddCompany']);
Route::get('/EditCompany/{id}',[CompanyCRUDController::class,'EditCompany']);
Route::delete('delete_company/{id}',[CompanyCRUDController::class,'delete_company']);
Route::post('updateCompany/{id}',[CompanyCRUDController::class,'updateCompany']);


Route::get('ViewCompany/{id}', [CompanyCRUDController::class,'ViewCompany']);
Route::get('ViewCompany/{id}/NewProduct', [ProductsController::class,'NewProduct']);
Route::post('NewProduct/{id}/store', [ProductsController::class,'store']);
