<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\API\AsetPointController;
use App\Http\Controllers\API\JalanLingkunganController;
use App\Http\Controllers\API\JalanLingkunganCoordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegisterPemohonController;
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

Route::get('/', [BerandaController::class, 'index'])->name('/');

Route::get('/login', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/sendWa', [TestingController::class, 'sendWa'])->name('send-wa');

Route::get('/register/pemohon', function () {
    return view('auth.registerpemohon', []);
})->name('register-pemohon');

Route::post('/register/pemohon', [RegisterPemohonController::class, 'store'])->name('store-register');

Route::middleware(['auth', 'is_verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/check-access', [HomeController::class, 'rbacCheck'])->name('check-access');
    Route::post('/check-access', [HomeController::class, 'chooseRole'])->name('choose-role');
    Route::get('/menus', [HomeController::class, 'loadMenu'])->name('load-menu');
});


//API
Route::get('/aset-points-api', [AsetPointController::class, 'getAllData']);
Route::get('/jalan-lingkungan-api', [JalanLingkunganController::class, 'getAllData']);
Route::get('/jalan-lingkungan-coord-api', [JalanLingkunganCoordController::class, 'getAllData']);
// Route::middleware('auth')->group(function () {
//     Route::prefix('dashboard')->group(function () {
//     });

//     Route::prefix('users')->group(function () {
//     });

//     Route::prefix('manajemen-menu')->group(function () {
//     });

//     Route::prefix('otoritas')->group(function () {
//     });
// });


// Route::get('/test-a', function () {
//     return Hash::make('eskelapa');
// });
