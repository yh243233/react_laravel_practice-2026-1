<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//テスト
//next側でアクセスする際は/api/usersで設定
//laravel側では勝手に/usersは/api/usersで解釈される。
Route::get('/users', [AuthController::class, 'users']);

Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', 'AuthController@logout');
// Route::get('/user', 'AuthController@user');
