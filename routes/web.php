<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // untuk mendaftarkan user controler
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\AcaraController;
use App\Http\Chart\TamuLineChart;



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
// mendaftarkan routes


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::middleware('auth')->group(
    function () {
        Route::get('/', function () {
            return view('home', ['title' => 'Chart Ajax']);
        })->name('home');

        Route::get('password', [UserController::class, 'password'])->name('password');
        Route::post('password', [UserController::class, 'password_action'])->name('password.action');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
        //route position
        Route::resource('positions', PositionController::class);
        //route departement
        Route::resource('departements', DepartementController::class);
        Route::get('departement/export-pdf', [DepartementController::class, 'exportPdf'])->name('departement.export-pdf');
        Route::get('position/export-excel', [PositionController::class, 'exportExcel'])->name('position.exportExcel');

        Route::resource('user', UserController::class);
        Route::get('users/export-pdf', [UserController::class, 'exportPdf'])->name('users.export-Pdf');
        // Route::get('tamus/export-pdf', [tamuController::class, 'exportPdf'])->name('tamus.export-Pdf');

        Route::resource('tamus', TamuController::class);
        
        
        Route::get('chart-line',[ TamuController::class, 'chartLine'])->name('tamus.chartLine');
        Route::get('chart-line-ajax',[ TamuController::class, 'chartLineAjax'])->name('tamus.chartLineAjax');


        Route::get('search/acara', [AcaraController::class, 'autocomplete'])->name('search.acara');
        Route::resource('acaras', AcaraController::class);
    }
);
