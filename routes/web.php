<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\QRCodeController;

Route::get('/', [QRCodeController::class, 'index'])->name('form');
Route::post('/generate', [QRCodeController::class, 'generate'])->name('generate');