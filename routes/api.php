<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
Route::prefix('books')->controller(BookController::class)->group(function () {
    Route::post('/', 'index');
    Route::get('/{id}', 'show');
});

Route::prefix('admin')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::get('/logout', 'logout');
    });

    Route::middleware([AdminAuthMiddleware::class])->controller(BookController::class)->group(function () {
        Route::post('/books', 'store');
        Route::put('/books/{id}', 'edit');
        Route::delete('/books/{id}', 'delete');
    });

});
