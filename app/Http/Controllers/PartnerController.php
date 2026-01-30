<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Afficher la page des partenaires
     */
    public function index()
    {
        // Récupérer les partenaires actifs depuis la base de données
        $dbPartners = Partner::active()
            ->ordered()
            ->get();

        return view('partners', compact('dbPartners'));
    }
}
