<?php
// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Liste des articles
    public function index(Request $request)
    {
        $query = Article::published()->latest('published_at');

        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $articles = $query->paginate(12);
        $featuredArticles = Article::published()->featured()->take(3)->get();
        $categories = Article::published()
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('articles.index', compact('articles', 'featuredArticles', 'categories'));
    }

    // Détail d'un article
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Incrémenter les vues
        $article->incrementViews();

        // Articles similaires (même catégorie)
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->take(3)
            ->get();

        // Si pas assez d'articles similaires, prendre les plus récents
        if ($relatedArticles->count() < 3) {
            $relatedArticles = Article::published()
                ->where('id', '!=', $article->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        }

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    // Articles par catégorie
    public function category($category)
    {
        $articles = Article::published()
            ->where('category', $category)
            ->latest('published_at')
            ->paginate(12);

        $categories = Article::published()
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('articles.category', compact('articles', 'category', 'categories'));
    }
}
