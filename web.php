<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ListeProduitsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\IndexadminController;
use App\Http\Controllers\Admin\InsController;
use App\Http\Controllers\Admin\ProdController;
use App\Http\Controllers\Admin\AchatController;
use App\Http\Controllers\Admin\CatController;






Route::get('/index', function () {
    return view('welcome');
});

// Route::get('/index', [IndexController::class, 'index']);
// web.php
//Route::get('/listeproduits/{id}', [listeproduitsController::class, 'listeproduits']);

//Route::get('/listeProduits/{id}', [listeProduitsController::class, 'index']);

//Route::get('/listeproduits/{id}', [ProduitController::class, 'index']);

//Route::get('/listeproduits/{id}', [listeproduitsController::class, 'listeproduits']);


Route::get('/listeproduits/{id}', [ListeProduitsController::class, 'listeproduitcat']);

//Route::get('/liste/{idcat}', [ListeProduitsController::class, 'index']);

Route::get('/produits/{id}', [ProduitController::class, 'details']);

Route::post('/produits/{id}/ajouter-au-panier', [ProduitController::class, 'ajouterAuPanier'])->name('achajouterAuPanierat');

Route::get('/', [indexController::class, 'index'])->name('index');







Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});






Route::prefix('admin')->group(function () {

    Route::get('/', [IndexadminController::class, 'index'])->name('admin.index');
    Route::get('/register', [InsController::class, 'showRegistrationForm'])->name('admin.register.form');
    Route::post('/register', [InsController::class, 'register'])->name('admin.register.submit');
    // routes/web.php


    Route::get('/admin/listeproduit', [ProdController::class, 'index'])->name('listeproduit');









    Route::get('/admin/ajouter-produit', [ProdController::class, 'create'])->name('ajouter-produit');
    Route::post('/admin/ajouter-produit', [ProdController::class, 'store']);
    Route::get('/admin/modifier-produit/{id}', [ProdController::class, 'edit'])->name('modifier-produit');
    Route::put('/admin/modifier-produit/{id}', [ProdController::class, 'update']);
    Route::delete('/admin/supprimer-produit/{id}', [ProdController::class, 'destroy'])->name('supprimer-produit');
    Route::get('/admin/listeachat', [AchatController::class, 'index'])->name('listeachat');

    Route::get('/admin/listecat', [CatController::class, 'index'])->name('categories.index');
    Route::get('/admin/listecat/create', [CatController::class, 'create'])->name('categories.create');
    Route::post('/admin/listecat', [CatController::class, 'store'])->name('categories.store');
    Route::get('/admin/listecat/{id}/edit', [CatController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/listecat/{id}', [CatController::class, 'update'])->name('categories.update');
    Route::delete('/admin/listecat/{id}', [CatController::class, 'destroy'])->name('categories.destroy');
});
