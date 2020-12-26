<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('student', StudentController::class);
Route::get('list', [StudentController::class, 'index']);
Route::view('create', [StudentController::class, 'create']);
Route::post('add', [RestoController::class, 'store']);
Route::get('view', [RestoController::class, 'show']);
Route::post('edit', [RestoController::class, 'edit']);
