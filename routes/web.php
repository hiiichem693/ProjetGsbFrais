<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;

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
    return view('home');
});

Route::get('getlogin', [VisiteurController::class, 'getLogin']);
Route::post('/login', [VisiteurController::class, 'signIn']);
Route::get('/getLogout', [VisiteurController::class, 'signOut']);
Route::get('/getListeFrais', [FraisController::class, 'getFraisVisiteur']);
Route::get('/modifierFrais/{id}', [FraisController::class, 'updateFrais']);
Route::post('validerFrais', [FraisController::class, 'validateFrais']);
Route::get('/ajouterFrais', [FraisController::class, 'addFrais']);
Route::get('/supprimerFrais/{id}', [FraisController::class, 'supprimeFrais']);
