<?php

use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level1', [TransactionController::class, "getAllEmployeeDetails"]);
Route::get('/level2', [TransactionController::class, 'getEmployeeDetails']);
Route::get('/level3', [TransactionController::class, "getAllDetails"]);
Route::get('/level4', [TransactionController::class, "getDetails"]);
