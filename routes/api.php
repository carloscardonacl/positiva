<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PositivaDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*app\Http\Controllers\Auth\AuthController.php
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['jwt'])->group(function () {
    Route::get('/test', [PositivaDataController::class, 'store'] );
});

Route::post('/auth', [AuthController::class, 'login']);
