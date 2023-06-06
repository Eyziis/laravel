<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customLoginController;

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

Auth::routes();

Route::get('/login', [CustomLoginController::class,'index'])->name('login');

//Route::post('login', 'LoginController@login');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/signaletique/locataire', [App\Http\Controllers\LocataireController::class, 'index'])->name('signaletiqueLocataire');
Route::get('/signaletique/locataire/search', [App\Http\Controllers\LocataireController::class, 'searchAjax'])->name('searchAjax');

Route::post('/signaletique/locataire', [App\Http\Controllers\LocataireController::class, 'store'])->name('store');


//Route::resource('signaletiqueLocataire', LocataireController::class);

