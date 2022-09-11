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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// make the route and method name different
// Route::get('contacts',[ContactController::class,'contacts']);
// //        above is the route            this one os the method name from the controller 

// // save to the database
// Route::post('save_contact',[ContactController::class,'saveContact']);

// // delete
// Route::delete('delete_contact/{id}',[ContactController::class,'delete_contact']);

// // The following routes are for editing

// // popuplate the forms 
// Route::get('getContact/{id}',[ContactController::class,'getContact']);

// // save the edited from to the dataabase
// Route::post('updateContact/{id}',[ContactController::class,'updateContact']);

// from web.php routes
Route::get('/index', [CompanyCRUDController::class,'index']);
Route::post('/AddCompany', [CompanyCRUDController::class,'AddCompany']);
Route::get('/EditCompany/{id}',[CompanyCRUDController::class,'EditCompany']);
Route::delete('delete_company/{id}',[CompanyCRUDController::class,'delete_company']);
Route::post('updateCompany/{id}',[CompanyCRUDController::class,'updateCompany']);


Route::get('ViewCompany/{id}', [CompanyCRUDController::class,'ViewCompany']);


// // Route::resource('product', ProductsController::class);
// Route::get('product/{id}/create', [ProductsController::class,'create']);
// Route::post('product/{id}/store', [ProductsController::class,'store']);