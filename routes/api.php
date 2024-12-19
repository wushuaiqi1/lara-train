<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\LoginController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);

Route::get('contract/getSimilar', [ContractController::class, 'getSimilarContract']);

Route::get('env', function () {
    return getenv('AUTHOR');
});


Route::namespace('auth')
    ->get('auth', 'AuthController@auth');

Route::get('auth', 'AuthController@auth');


Route::get('path',[\App\Http\Controllers\AuthController::class,'testPath']);


Route::get('hi',[\App\Http\Controllers\HiController::class,'hi']);

Route::post('hi/post', [\App\Http\Controllers\HiController::class, 'hiPost']);
// 需要注意，api.php有一个前缀。
