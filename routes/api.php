<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Models\Todo;


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


Auth::routes();

Route::post('register', [ApiController::class, 'register']);
Route::post('login', [ApiController::class, 'login']);
Route::get('logout', [ApiController::class, 'logout']);


Route::get('/index', [ApiController::class, 'index']);
Route::get('create', [ApiController::class, 'create']);
Route::get('create', [ApiController::class, 'create']);
Route::get('create', [ApiController::class, 'create']);
Route::post('/store', [ApiController::class, 'store']);
Route::get('/show/{id}', [ApiController::class, 'show']);
Route::get('/edit/{id}', [ApiController::class, 'edit']);
Route::post('/update/{id}', [ApiController::class, 'update']);
Route::get('/delete/{id}', [ApiController::class, 'destroy']);
