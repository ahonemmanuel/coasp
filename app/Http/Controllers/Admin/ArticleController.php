<?php
// app/Http/Controllers/Admin/ArticleController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query()->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $articles = $query->paginate(15);
        $categories = Article::distinct()->pluck('category')->filter();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Article::distinct()->pluck('category')->filter();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:articles,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048', // Multiple images
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:100',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Gérer l'image principale
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles/featured', 'public');
        }

        // Gérer les images de la galerie
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('articles/gallery', 'public');
                $galleryImages[] = $path;
            }
        }
        $validated['gallery_images'] = $galleryImages;

        if (($validated['is_published'] ?? false) && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }


        $article = Article::create($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article créé avec succès !');
    }

    public function edit(Article $article)
    {
        $categories = Article::distinct()->pluck('category')->filter();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:articles,slug,' . $article->id,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:100',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Gérer la nouvelle image principale
        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles/featured', 'public');
        }

        // Gérer la suppression de l'image principale
        if ($request->has('remove_featured_image') && $request->remove_featured_image) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $validated['featured_image'] = null;
        }

        // Gérer les nouvelles images de galerie
        $currentGallery = $article->gallery_images ?? [];

        // Supprimer les images de galerie sélectionnées
        if ($request->has('remove_gallery_images')) {
            $toRemove = $request->remove_gallery_images;
            foreach ($toRemove as $imageToRemove) {
                if (($key = array_search($imageToRemove, $currentGallery)) !== false) {
                    Storage::disk('public')->delete($imageToRemove);
                    unset($currentGallery[$key]);
                }
            }
            $currentGallery = array_values($currentGallery); // Réindexer
        }

        // Ajouter de nouvelles images à la galerie
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('articles/gallery', 'public');
                $currentGallery[] = $path;
            }
        }

        $validated['gallery_images'] = $currentGallery;

        if ($validated['is_published'] && empty($article->published_at)) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article mis à jour avec succès !');
    }

    public function destroy(Article $article)
    {
        // Supprimer l'image principale
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        // Supprimer toutes les images de la galerie
        if ($article->gallery_images) {
            foreach ($article->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article supprimé avec succès !');
    }

    public function toggleStatus(Article $article)
    {
        $article->is_published = !$article->is_published;

        if ($article->is_published && !$article->published_at) {
            $article->published_at = now();
        }

        $article->save();

        return back()->with('success', 'Statut de publication modifié !');
    }

    public function toggleFeatured(Article $article)
    {
        $article->is_featured = !$article->is_featured;
        $article->save();

        return back()->with('success', 'Statut de mise en avant modifié !');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $path = $request->file('file')->store('articles/content', 'public');

        return response()->json([
            'location' => Storage::url($path)
        ]);
    }

    // Nouvelle méthode pour supprimer une image de galerie via AJAX
    public function deleteGalleryImage(Request $request, Article $article)
    {
        $imagePath = $request->input('image');

        $gallery = $article->gallery_images ?? [];

        if (($key = array_search($imagePath, $gallery)) !== false) {
            Storage::disk('public')->delete($imagePath);
            unset($gallery[$key]);
            $article->gallery_images = array_values($gallery);
            $article->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
