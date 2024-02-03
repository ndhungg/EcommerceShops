<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;


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


// Backend routes
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')
->middleware('admin');



// User routes
Route::group(['prefix' => 'user'], function(){
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::get('update', [UserController::class, 'update'])->name('user.update')->middleware('admin');
    Route::get('destroy', [UserController::class, 'destroy'])->name('user.destroy')->middleware('admin');
});

// Route::get('user/index', [UserController::class, 'index'])->name('user.index')
// ->middleware('admin');

// Route::get('user/create', [UserController::class, 'create'])->name('user.index')->middleware('admin');


// Ajax
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])
->name('ajax.location.index')->middleware('admin');




Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')
->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');