<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes Admin - Connexion
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');

    // Routes protégées par le middleware admin
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });

    // Gestion des documents
    Route::prefix('documents')->name('documents.')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('index');
        Route::get('/create', [DocumentController::class, 'create'])->name('create');
        Route::post('/', [DocumentController::class, 'store'])->name('store');
        Route::get('/{document}/edit', [DocumentController::class, 'edit'])->name('edit');
        Route::put('/{document}', [DocumentController::class, 'update'])->name('update');
        Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('destroy');
        Route::patch('/{document}/toggle-status', [DocumentController::class, 'toggleStatus'])->name('toggle-status');
        Route::patch('/{document}/toggle-featured', [DocumentController::class, 'toggleFeatured'])->name('toggle-featured');
    });

});

// Page d'accueil

Route::get('/', function () {
    return view('welcome');
})->name('home');


// À propos
Route::prefix('qui-sommes-nous')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
  });



// Ressources
Route::prefix('ressources')->group(function () {
    // Actualités
    Route::get('/actualites', [NewsController::class, 'index'])->name('news.index');
    Route::get('/actualites/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/actualites/categorie/{slug}', [NewsController::class, 'category'])->name('news.category');

    // Documents utiles
    Route::get('/documents', [DocController::class, 'index'])->name('documents.index');

    // Galerie
    Route::get('/galerie', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/galerie/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
});

// Réseaux
Route::prefix('reseaux')->group(function () {
    Route::get('/partenaires', [PartnerController::class, 'partners'])->name('partners');
    Route::get('/allies', [PartnerController::class, 'allies'])->name('allies');
    Route::get('/membres', [PartnerController::class, 'members'])->name('members');
});

// Contact
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');
});

// Newsletter
Route::post('/newsletter/subscribe', [HomeController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// Recherche
Route::get('/recherche', [HomeController::class, 'search'])->name('search');

// Pages légales
Route::view('/politique-confidentialite', 'pages.privacy')->name('privacy');
Route::view('/conditions-utilisation', 'pages.terms')->name('terms');
Route::view('/mentions-legales', 'pages.legal')->name('legal');
