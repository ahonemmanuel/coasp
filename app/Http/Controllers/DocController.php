<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DocController extends Controller
{
    /**
     * Afficher le formulaire de contact
     */
    public function index()
    {
        return view('documents');
    }


}
