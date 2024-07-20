<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BoutiquesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AchatsController;
use App\Http\Controllers\VentesController;
use App\Http\Controllers\EntreesController;
use App\Http\Controllers\SortisController;
use App\Http\Controllers\AuthController;


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


Route::prefix('boutiques')->group(function () {
    Route::get('/liste', [BoutiquesController::class, 'liste_boutiques'])->name('liste_boutiques');
    Route::get('/ajout', [BoutiquesController::class, 'ajout_boutiques'])->name('ajout_boutiques');
    Route::post('/ajout', [BoutiquesController::class, 'enregistrer_boutiques'])->name('enregistrer_boutiques');
    Route::delete('/supp/{id_bout}', [BoutiquesController::class, 'supp_boutiques'])->name('supp_boutiques');
    Route::get('/modif/{id_bout}', [BoutiquesController::class, 'modif_boutiques'])->name('modif_boutiques');
    Route::put('/modif/{id}', [BoutiquesController::class, 'enregistrer_modif_boutiques'])->name('enregistrer_modif_boutiques');
    Route::get('/details/{id}', [BoutiquesController::class, 'details_boutique'])->name('details_boutique');
});


Route::prefix('users')->group(function () {
    Route::get('/liste', [UsersController::class, 'liste_users'])->name('liste_users');
    Route::get('/ajout', [UsersController::class, 'ajout_users'])->name('ajout_users');
    Route::post('/ajout', [UsersController::class, 'enregistrer_users'])->name('enregistrer_users');
    Route::get('/modif/{id_users}', [UsersController::class, 'modif_users'])->name('modif_users');
    Route::put('/update/{id_users}', [UsersController::class, 'update_users'])->name('update_users');
    Route::delete('/supp/{id_users}', [UsersController::class, 'supp_users'])->name('supp_users');
});



Route::prefix('categories')->group(function () {
    Route::get('/liste', [CategoriesController::class, 'liste'])->name('liste_categories');
    Route::get('/ajout', [CategoriesController::class, 'ajout'])->name('ajout_categorie');
    Route::post('/', [CategoriesController::class, 'enregistrer'])->name('enregistrer_categorie');
    Route::get('/{id_cat}/modifier', [CategoriesController::class, 'modifier'])->name('modifier_categorie');
    Route::put('/{id_cat}', [CategoriesController::class, 'mettre_a_jour'])->name('mettre_a_jour_categorie');
    Route::delete('/{id_cat}', [CategoriesController::class, 'supprimer'])->name('supprimer_categorie');
});

Route::prefix('produits')->group(function () {
    Route::get('/liste', [ProduitsController::class, 'liste'])->name('produits.liste');
    Route::get('/ajout', [ProduitsController::class, 'ajout'])->name('produits.ajout');
    Route::post('/enregistrer', [ProduitsController::class, 'enregistrer'])->name('produits.enregistrer');
    Route::get('/{id}/modifier', [ProduitsController::class, 'modifier'])->name('produits.modifier'); // Modifier la route ici
    Route::put('/{id}/mettre-a-jour', [ProduitsController::class, 'mettreAJour'])->name('produits.mettreAJour');
    Route::delete('/{id}/supprimer', [ProduitsController::class, 'supp'])->name('produits.supp'); // Modifier la route ici
});

Route::prefix('fournisseurs')->group(function () {
    Route::get('/liste', [FournisseursController::class, 'liste_fournisseurs'])->name('fournisseurs.liste');
    Route::get('/ajout', [FournisseursController::class, 'ajout_fournisseurs'])->name('fournisseurs.ajout');
    Route::post('/enregistrer', [FournisseursController::class, 'enregistrer_fournisseurs'])->name('fournisseurs.enregistrer');
    Route::get('/modif/{id}', [FournisseursController::class, 'modif_fournisseurs'])->name('fournisseurs.modif');
    Route::put('/mettreAJour/{id}', [FournisseursController::class, 'mettreAJour'])->name('fournisseurs.mettreAJour');
    Route::delete('/supp/{fournisseur}', [FournisseursController::class, 'supp_fournisseurs'])->name('fournisseurs.supp');
});

Route::prefix('clients')->group(function () {
    Route::get('/liste', [ClientsController::class, 'liste_clients'])->name('clients.liste');
    Route::get('/ajout', [ClientsController::class, 'ajout_clients'])->name('clients.ajout');
    Route::post('/enregistrer', [ClientsController::class, 'enregistrer_clients'])->name('clients.enregistrer');
    Route::get('/modif/{id_clt}', [ClientsController::class, 'modif_clients'])->name('clients.modif');
    Route::put('/mettre_a_jour/{id_clt}', [ClientsController::class, 'mettre_a_jour'])->name('clients.mettre_a_jour');
    Route::delete('/supp/{id_clt}', [ClientsController::class, 'supp_clients'])->name('clients.supp');
});

Route::prefix('achats')->group(function () {
    Route::get('/ajout', [AchatsController::class, 'ajout'])->name('achats.ajout');
    Route::get('/liste', [AchatsController::class, 'liste'])->name('achats.liste');
    Route::post('/enregistrer', [AchatsController::class, 'enregistrer'])->name('achats.enregistrer');
    Route::get('/facture/{id}', [AchatsController::class, 'facture'])->name('achats.facture');
});

Route::prefix('entrees')->group(function () {
    Route::get('/ajout1/{id_act}', [EntreesController::class, 'ajout1'])->name('entrees.ajout1');
    Route::post('/enregistrer', [EntreesController::class, 'enregistrerEntree'])->name('entrees.enregistrer');
});


Route::prefix('ventes')->group(function () {
    Route::get('/liste', [VentesController::class, 'liste'])->name('ventes.liste');
    Route::get('/ajout', [VentesController::class, 'ajout'])->name('ventes.ajout');
    Route::post('/enregistrer', [VentesController::class, 'enregistrer'])->name('ventes.enregistrer');
    Route::get('/ajout2', [VentesController::class, 'ajout2'])->name('ventes.ajout2');
    Route::post('/enregistrer2', [VentesController::class, 'enregistrer2'])->name('ventes.enregistrer2');
    Route::get('/recu/{id}', [VentesController::class, 'recu'])->name('ventes.recu');
});

Route::prefix('sortis')->group(function () {
    Route::get('/ajout1/{id_vente}', [SortisController::class, 'ajout1'])->name('sortis.ajout1');
    Route::post('/enregistrerSortis', [SortisController::class, 'enregistrerSortis'])->name('sortis.enregistrerSortis');
});

// Route protégée par l'authentification
Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



