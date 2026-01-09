<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Récupérer la langue depuis la session ou utiliser la langue par défaut
        $locale = Session::get('locale', config('app.locale'));

        // Vérifier que la langue est supportée
        if (!in_array($locale, config('app.available_locales'))) {
            $locale = config('app.fallback_locale');
        }

        // Définir la langue de l'application
        App::setLocale($locale);

        return $next($request);
    }
}
