<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LanguageController;
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


// Dans web.php, ajouter dans Route::prefix('admin')->middleware('admin')

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Admin\ArticleController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('store');
    Route::get('/{article}/edit', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('edit');
    Route::put('/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('update');
    Route::delete('/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('destroy');
    Route::patch('/{article}/toggle-status', [App\Http\Controllers\Admin\ArticleController::class, 'toggleStatus'])->name('toggle-status');
    Route::patch('/{article}/toggle-featured', [App\Http\Controllers\Admin\ArticleController::class, 'toggleFeatured'])->name('toggle-featured');
    Route::post('/upload-image', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImage'])->name('upload-image');
    Route::delete('/{article}/gallery-image', [App\Http\Controllers\Admin\ArticleController::class, 'deleteGalleryImage'])->name('delete-gallery-image');
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



// Route de téléchargement des documents
Route::get('/documents/{document}/download', [DocController::class, 'download'])
    ->name('documents.download');

// Ressources
Route::prefix('ressources')->group(function () {
    Route::prefix('blog')->group(function () {
        Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
        Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.show');
    });

    Route::get('/blog/categorie/{category}', [App\Http\Controllers\ArticleController::class, 'category'])->name('blog.category');


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
