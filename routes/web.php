<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserIndex as U_Index;
use App\Http\Controllers\UtilisateurModelController;
use App\Models\UserIndex;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
       return view('index');
});


Route::get('/login' , [UtilisateurModelController::class , 'Login_Page'])->name('login');   
Route::get('/register' , [UtilisateurModelController::class , 'Register_Page']);
//Traitmment de Authontification...
Route::post('/signup' , [UtilisateurModelController::class , 'Register']);
Route::post('/singnin' , [UtilisateurModelController::class , 'Login']);

//l'affichage des pages
Route::get('Product', [ProductController::class , 'index'])->name("ProductView");
Route::get('/Client', [ClientController::class , 'index'])->name("ClientView");
Route::get('/', [ClientController::class , 'index'])->name("ClientView");
Route::get('/Categorie', [CategorieController::class , 'index'])->name("CategorieView");
Route::get('/roles' , [RolesController::class , 'index']);

//l'affichage des page D'ajout
Route::get('/addClientpage', [ClientController::class , 'AddClientPage'])->name("AddclientView");
Route::get('/addProduitpage', [ProductController::class , 'AddProduitPage'])->name("AddProduitView");
Route::get('/addCategoriepage', [CategorieController::class , 'AddCategoriePage'])->name("AddCategorieView");
Route::get('/addrolepage' , [RolesController::class , 'addrolepage']);


//l'affichage des page De Modification
Route::get('/modifyClientpage', [ClientController::class , 'modifyClientPage'])->name("modifyclientView");
Route::get('/modifyProduitpage', [ProductController::class , 'modifyProduitPage'])->name("modifyProduitView");
Route::get('/modifyCategoriepage', [CategorieController::class , 'modifyCategoriePage'])->name("modifyCategorieView");
Route::get('/modifyrolepage' , [RolesController::class , 'modifyrolepage']);


// Traitemment d'ajout
Route::post('/AddClient', [ClientController::class, 'Add_Client'])->name("Add_Client");
Route::post('/AddPdouit', [ProductController::class, 'Add_Produit'])->name("Add_Pdouit");
Route::post('/addcategorie', [CategorieController::class, 'AddCategorie'])->name("AddCategorie");
Route::post('/addrole', [RolesController::class, 'Add_Role'])->name("Add_Role");

// Traitemment de Supprission


Route::get('/DeleteClient', [ClientController::class, 'Delete_Client'])->name("/delete_client");
Route::get('/DeleteProduit', [ProductController::class, 'Delete_Produit'])->name("Delete_Produit");
Route::get('/DeleteCategorie', [CategorieController::class, 'DeleteCategorie'])->name("DeleteCategorie");
Route::get('/DeleteRole', [RolesController::class, 'DeleteRole'])->name("DeleteRole");

// Traitemment De Modification
Route::post('/ModifyClient', [ClientController::class , 'Modify_Client'])->name("modify_client");
Route::post('/ModifyPdouit', [ProductController::class , 'Modify_Produit'])->name("Modify_Pdouit");
Route::post('/modifyCategorie', [CategorieController::class , 'modifyCategorie']);
Route::post('/modifyRole', [RolesController::class , 'modifyRole']);

// Forgot Password________________________________________________________________________________
Route::get('/forgotpage' , [UtilisateurModelController::class   ,"forgotpage"]);
Route::post('/forgot' , [UtilisateurModelController::class   ,"forgot"]);
Route::get('/reset/{token}' , [UtilisateurModelController::class   ,"reset"]);
Route::post('/reset/{token}' , [UtilisateurModelController::class   ,"reset_pass"]);
// Forgot Password________________________________________________________________________________

//Page Note Found----------------------------------------------
        Route::get('/Notfound', function(){
            return view('notefound');
        });
//Page Note Found----------------------------------------------

Route::get('/home', [U_Index::class, 'indexUser']);
Route::get('/contact', [U_Index::class, 'contact']);
Route::get('/produits', [U_Index::class, 'produits']);
Route::get('/news', [U_Index::class, 'news']);
Route::get('/about', [U_Index::class, 'about']);
Route::get("/searchpageUser/{title?}" , [U_Index::class, 'search']);
 
Route::get("/searchpage/{title?}" , [ProductController::class, 'search']);

