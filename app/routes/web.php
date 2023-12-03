<?php

use App\Http\Controllers\ResourceController;
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

Route::middleware('auth.basic')->resource('/', ResourceController::class)
    ->parameters(['' => 'id'])->whereNumber(['id'])->except('index', 'show');

Route::resource('/', ResourceController::class)
    ->parameters(['' => 'id'])->whereNumber(['id'])->only(['index', 'show']);
