<?php

namespace App\Http\Controllers;

use App\Models\Ally;
use Illuminate\Http\Request;

class AllyController extends Controller
{
    /**
     * Afficher la page des alliés
     */
    public function index()
    {
        // Récupérer les alliés actifs depuis la base de données
        $dbAllies = Ally::active()
            ->ordered()
            ->get();

        return view('allies', compact('dbAllies'));
    }
}
