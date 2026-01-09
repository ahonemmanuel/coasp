<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request, $locale)
    {
        // Vérifier que la langue est supportée
        if (!in_array($locale, config('app.available_locales'))) {
            abort(400, 'Langue non supportée');
        }

        // Enregistrer la langue dans la session
        Session::put('locale', $locale);

        // Rediriger vers la page précédente
        return redirect()->back();
    }
}
