<?php

use App\Http\Controllers\SendMailController;
use App\Http\Controllers\TimeStandController;
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
    return view('time');
});

Route::get('/create', [TimeStandController::class, 'createTime'])->name('create.time');
Route::get('/lists', [TimeStandController::class, 'timeLists'])->name('show.time');
Route::post('/sendEmail', [SendMailController::class, 'sendEmail'])->name('send.mail');
Route::get('/mailLists', [SendMailController::class, 'mailLists'])->name('mail.list');
