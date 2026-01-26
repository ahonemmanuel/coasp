<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Liste des documents
     */
    public function index(Request $request)
    {
        $query = Document::query();

        // Filtres
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        if ($request->filled('language')) {
            $query->byLanguage($request->language);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documents = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $stats = [
            'total' => Document::count(),
            'active' => Document::active()->count(),
            'featured' => Document::featured()->count(),
            'downloads' => Document::sum('download_count'),
        ];

        return view('admin.documents.index', compact('documents', 'stats'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Enregistrer un nouveau document
     */
    public function store(DocumentRequest $request)
    {
        try {
            $data = $request->validated();

            // Upload du fichier
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('documents', $fileName, 'public');

                $data['file_path'] = $filePath;
                $data['file_name'] = $file->getClientOriginalName();
                $data['file_type'] = $file->getClientOriginalExtension();
                $data['file_size'] = round($file->getSize() / 1024); // Convertir en KB
            }

            // Générer le slug
            $data['slug'] = Str::slug($data['title']);

            // Créer le document
            Document::create($data);

            return redirect()->route('admin.documents.index')
                ->with('success', 'Document ajouté avec succès !');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Erreur lors de l\'ajout du document : ' . $e->getMessage());
        }
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Mettre à jour un document
     */
    public function update(DocumentRequest $request, Document $document)
    {
        try {
            $data = $request->validated();

            // Upload d'un nouveau fichier
            if ($request->hasFile('file')) {
                // Supprimer l'ancien fichier
                if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                    Storage::disk('public')->delete($document->file_path);
                }

                $file = $request->file('file');
                $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('documents', $fileName, 'public');

                $data['file_path'] = $filePath;
                $data['file_name'] = $file->getClientOriginalName();
                $data['file_type'] = $file->getClientOriginalExtension();
                $data['file_size'] = round($file->getSize() / 1024);
            }

            // Mettre à jour le slug si le titre change
            if ($data['title'] !== $document->title) {
                $data['slug'] = Str::slug($data['title']);
            }

            $document->update($data);

            return redirect()->route('admin.documents.index')
                ->with('success', 'Document modifié avec succès !');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Erreur lors de la modification : ' . $e->getMessage());
        }
    }

    /**
     * Supprimer un document
     */
    public function destroy(Document $document)
    {
        try {
            $document->delete();

            return redirect()->route('admin.documents.index')
                ->with('success', 'Document supprimé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    /**
     * Activer/Désactiver un document
     */
    public function toggleStatus(Document $document)
    {
        $document->update(['is_active' => !$document->is_active]);

        return back()->with('success', 'Statut modifié avec succès !');
    }

    /**
     * Mettre en vedette
     */
    public function toggleFeatured(Document $document)
    {
        $document->update(['is_featured' => !$document->is_featured]);

        return back()->with('success', 'Document ' . ($document->is_featured ? 'mis en vedette' : 'retiré de la vedette') . ' !');
    }
}
