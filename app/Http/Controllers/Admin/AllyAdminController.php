<?php
// app/Http/Controllers/Admin/AllyAdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ally;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AllyAdminController extends Controller
{
    /**
     * Liste des alliés
     */
    public function index()
    {
        $allies = Ally::orderBy('order', 'asc')
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('admin.allies.index', compact('allies'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('admin.allies.create');
    }

    /**
     * Enregistrer un nouvel allié
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Upload du logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('allies', $filename, 'public');
            $validated['logo'] = $path;
        }

        Ally::create($validated);

        return redirect()->route('admin.allies.index')
            ->with('success', 'Allié créé avec succès!');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Ally $ally)
    {
        return view('admin.allies.edit', compact('ally'));
    }

    /**
     * Mettre à jour un allié
     */
    public function update(Request $request, Ally $ally)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Upload du nouveau logo si fourni
        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo
            if ($ally->logo && Storage::disk('public')->exists($ally->logo)) {
                Storage::disk('public')->delete($ally->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('allies', $filename, 'public');
            $validated['logo'] = $path;
        }

        $ally->update($validated);

        return redirect()->route('admin.allies.index')
            ->with('success', 'Allié mis à jour avec succès!');
    }

    /**
     * Supprimer un allié
     */
    public function destroy(Ally $ally)
    {
        // Supprimer le logo
        if ($ally->logo && Storage::disk('public')->exists($ally->logo)) {
            Storage::disk('public')->delete($ally->logo);
        }

        $ally->delete();

        return redirect()->route('admin.allies.index')
            ->with('success', 'Allié supprimé avec succès!');
    }

    /**
     * Activer/Désactiver un allié
     */
    public function toggleStatus(Ally $ally)
    {
        $ally->update(['is_active' => !$ally->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $ally->is_active,
            'message' => 'Statut mis à jour avec succès!'
        ]);
    }
}
