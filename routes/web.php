<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\InformationsController;

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

Route::resource('profiles',ProfilController::class);
Route::resource('publications',PublicationController::class);



Route::get('/', [homeController::class, 'index'])->name('homepage');

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');




Route::get('/settings', [InformationsController::class, 'index'])->name('settings.index');

/*Route::get('/google', function(){
    return redirect()->away('https://www.google.com');
})->name('route');*/







