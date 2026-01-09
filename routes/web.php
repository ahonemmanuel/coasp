<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil

Route::get('/', function () {
    return view('welcome');
})->name('home');


// À propos
Route::prefix('qui-sommes-nous')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
    Route::get('/mission', [AboutController::class, 'mission'])->name('about.mission');
    Route::get('/vision', [AboutController::class, 'vision'])->name('about.vision');
    Route::get('/equipe', [AboutController::class, 'team'])->name('about.team');
    Route::get('/equipe/{slug}', [AboutController::class, 'teamMember'])->name('about.team.member');
});

// Services / Axes d'intervention
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('services.show');
});

// Ressources
Route::prefix('ressources')->group(function () {
    // Actualités
    Route::get('/actualites', [NewsController::class, 'index'])->name('news.index');
    Route::get('/actualites/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/actualites/categorie/{slug}', [NewsController::class, 'category'])->name('news.category');

    // Documents utiles
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/{slug}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('/documents/telecharger/{id}', [DocumentController::class, 'download'])->name('documents.download');

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
