<?php

use Illuminate\Support\Facades\Auth;
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
})->name('home');


// auth
Auth::routes();
Route::get('/dashboard', function () {
    return redirect()->route(strtolower(Auth::user()->roles) . '.home');
})->name('dashboard');


Route::group([
    'prefix' => 'worker',
    'as' => 'worker.'
], function () {
    Route::get('/', function () {
        return redirect('worker/dashboard');
    });
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});