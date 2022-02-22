<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ExternalBookController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('todos', TodoController::class);

// Authentication
Route::group([
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
Route::get('/user', [AuthController::class, 'userProfile'])->middleware('jwt.auth');



// Route::group([
//     'prefix'=>"todos"
// ], function($router) {
//     Route::post("/", [TodoController::class, 'store'])->middleware('auth.jwt');
// }

// );

Route::resource('books', BookController::class);

Route::get('/external-books', [ExternalBookController::class, 'fetchBooks']);
