<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ShoppingController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
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

//API route for register new user
Route::post('/signup', [AuthController::class, 'register']);
//API route for login user
Route::post('/signin', [AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('/profile', function (Request $request) {
    //     return auth()-php >user();
    // });

    //Api Get All User
    Route::get('/users',  [UserController::class, 'index']);
    Route::resource('shopping', ShoppingController::class);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
