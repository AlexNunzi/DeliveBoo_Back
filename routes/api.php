<?php

use App\Http\Controllers\Api\BraintreeController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;

use App\Http\Controllers\Api\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/types', [TypeController::class, 'index']);
Route::get('/foods/{slug}', [FoodController::class, 'index']);

Route::get('/restaurant/type', [RestaurantController::class, 'index']);

Route::get('client/token', [BraintreeController::class, 'generateToken']);
Route::post('client/make-payment', [BraintreeController::class, 'makePayment']);

