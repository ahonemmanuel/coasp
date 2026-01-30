<?php
// app/Http/Controllers/Admin/PartnerAdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerAdminController extends Controller
{
    /**
     * Liste des partenaires
     */
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Enregistrer un nouveau partenaire
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
            $path = $logo->storeAs('partners', $filename, 'public');
            $validated['logo'] = $path;
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire créé avec succès!');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Mettre à jour un partenaire
     */
    public function update(Request $request, Partner $partner)
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
            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }

            $logo = $request->file('logo');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $logo->getClientOriginalExtension();
            $path = $logo->storeAs('partners', $filename, 'public');
            $validated['logo'] = $path;
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire mis à jour avec succès!');
    }

    /**
     * Supprimer un partenaire
     */
    public function destroy(Partner $partner)
    {
        // Supprimer le logo
        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire supprimé avec succès!');
    }

    /**
     * Activer/Désactiver un partenaire
     */
    public function toggleStatus(Partner $partner)
    {
        $partner->update(['is_active' => !$partner->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $partner->is_active,
            'message' => 'Statut mis à jour avec succès!'
        ]);
    }
}
