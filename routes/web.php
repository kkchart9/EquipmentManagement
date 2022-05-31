<?php

use Illuminate\Support\Facades\Route;

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

// 入力画面
Route::get('/equipment/register', [App\Http\Controllers\Equipment_RegisterController::class, 'index']);

// 確認画面
Route::get('/equipment/register/confirm', [App\Http\Controllers\Equipment_RegisterController::class, 'confirm']);

// 登録用
Route::post('/equipment/register/confirm/store', [App\Http\Controllers\Equipment_RegisterController::class, 'store']);



// スケジュール画面
Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index']);

// スケジュール登録画面
Route::get('/schedule/register', [App\Http\Controllers\ScheduleController::class, 'register']);

// 登録
Route::post('/schedule/register', [App\Http\Controllers\ScheduleController::class, 'store']);

// スケジュール編集画面
Route::get('/schedule/edit', [App\Http\Controllers\ScheduleController::class, 'edit']);

// スケジュールをアップデート
Route::post('/schedule/edit', [App\Http\Controllers\ScheduleController::class, 'update']);