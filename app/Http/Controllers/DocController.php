<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    /**
     * Afficher la page des documents publics
     */
    public function index(Request $request)
    {
        // Récupérer les documents dynamiques depuis la base de données
        $dynamicDocuments = Document::active()
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Documents statiques (anciens documents à conserver)
        $staticDocuments = $this->getStaticDocuments();

        // Combiner tous les documents pour le filtrage
        $allDocuments = $this->combineDocuments($dynamicDocuments, $staticDocuments);

        return view('documents', compact('allDocuments'));
    }

    /**
     * Télécharger un document dynamique
     */
    public function download(Document $document)
    {
        if (!$document->is_active) {
            abort(404, 'Document non disponible');
        }

        // Incrémenter le compteur de téléchargements
        $document->incrementDownloadCount();

        // Télécharger le fichier
        return Storage::disk('public')->download(
            $document->file_path,
            $document->file_name
        );
    }

    /**
     * Définir les documents statiques (anciens documents - VRAIS NOMS)
     */
    private function getStaticDocuments()
    {
        return [
            [
                'id' => 'static-1',
                'title' => '7ème Édition 2022',
                'description' => 'Déclaration de la Foire COASP - Engagement pour une souveraineté semencière',
                'category' => 'declaration',
                'language' => 'fr',
                'file_url' => asset('docs/Declaration-de-la-7eme-edition-Foire-COASP-2022.pdf'),
                'file_name' => 'Declaration-de-la-7eme-edition-Foire-COASP-2022.pdf',
                'file_type' => 'pdf',
                'year' => '2022',
                'is_static' => true,
                'created_at' => '2022-01-01',
            ],
            [
                'id' => 'static-2',
                'title' => 'Déclaration Djimini 2018',
                'description' => 'Version française de la déclaration sur les semences paysannes',
                'category' => 'declaration',
                'language' => 'fr',
                'file_url' => asset('docs/Declaration-Djimini-2018-finale.pdf'),
                'file_name' => 'Declaration-Djimini-2018-finale.pdf',
                'file_type' => 'pdf',
                'year' => '2018',
                'flag' => '🇫🇷',
                'is_static' => true,
                'created_at' => '2018-01-01',
            ],
            [
                'id' => 'static-3',
                'title' => 'Djimini Declaration 2018',
                'description' => 'English version - Peasant Seed Fair Declaration',
                'category' => 'declaration',
                'language' => 'en',
                'file_url' => asset('docs/Declaration-Djimini-Peasant-Seed-Fair-2018-English.pdf'),
                'file_name' => 'Declaration-Djimini-Peasant-Seed-Fair-2018-English.pdf',
                'file_type' => 'pdf',
                'year' => '2018',
                'flag' => '🇬🇧',
                'is_static' => true,
                'created_at' => '2018-01-01',
            ],
            [
                'id' => 'static-4',
                'title' => 'Foire 2014',
                'description' => 'Journal de la Foire des semences paysannes ASPSP 2014',
                'category' => 'journal',
                'language' => 'fr',
                'file_url' => asset('docs/ASPSP_2014_journal_foire.pdf'),
                'file_name' => 'ASPSP_2014_journal_foire.pdf',
                'file_type' => 'pdf',
                'year' => '2014',
                'is_static' => true,
                'created_at' => '2014-01-01',
            ],
            [
                'id' => 'static-5',
                'title' => '4ème Édition',
                'description' => 'Déclaration de la Foire Ouest-Africaine des semences paysannes',
                'category' => 'declaration',
                'language' => 'fr',
                'file_url' => asset('docs/DECLARATION_Foire_Ouest_Africaine_4eme-Edition.pdf'),
                'file_name' => 'DECLARATION_Foire_Ouest_Africaine_4eme-Edition.pdf',
                'file_type' => 'pdf',
                'year' => '4ème Édition',
                'is_static' => true,
                'created_at' => '2013-01-01',
            ],
            [
                'id' => 'static-6',
                'title' => 'Foire 2011',
                'description' => 'Déclaration de la Foire des semences paysannes 2011',
                'category' => 'declaration',
                'language' => 'fr',
                'file_url' => asset('docs/Foire-semences-Paysannes-2011-Declaration.pdf'),
                'file_name' => 'Foire-semences-Paysannes-2011-Declaration.pdf',
                'file_type' => 'pdf',
                'year' => '2011',
                'is_static' => true,
                'created_at' => '2011-01-01',
            ],
            [
                'id' => 'static-7',
                'title' => '3ème Foire Sous-Régionale',
                'description' => 'Publication Grain Magazine - Foire ouest-africaine',
                'category' => 'journal',
                'language' => 'fr',
                'file_url' => asset('docs/grain-4545-3eme-foire-sous-regionale-ouest-africaine-des-semences-paysannes.pdf'),
                'file_name' => 'grain-4545-3eme-foire-sous-regionale-ouest-africaine-des-semences-paysannes.pdf',
                'file_type' => 'pdf',
                'year' => '3ème Édition',
                'is_static' => true,
                'created_at' => '2013-01-01',
            ],
        ];
    }

    /**
     * Combiner les documents dynamiques et statiques
     */
    private function combineDocuments($dynamicDocuments, $staticDocuments)
    {
        $combined = [];

        // Ajouter les documents dynamiques
        foreach ($dynamicDocuments as $doc) {
            $combined[] = [
                'id' => $doc->id,
                'title' => $doc->title,
                'description' => $doc->description,
                'category' => $doc->category,
                'language' => $doc->language,
                'file_url' => $doc->file_url,
                'file_name' => $doc->file_name,
                'file_type' => $doc->file_type,
                'file_size' => $doc->formatted_file_size ?? null,
                'download_count' => $doc->download_count,
                'is_featured' => $doc->is_featured,
                'is_static' => false,
                'is_dynamic' => true,
                'created_at' => $doc->created_at->format('Y-m-d'),
                'download_route' => route('documents.download', $doc->id),
            ];
        }

        // Ajouter les documents statiques
        foreach ($staticDocuments as $doc) {
            $combined[] = $doc;
        }

        // Trier tous les documents par date (les plus récents en premier)
        usort($combined, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        return $combined;
    }
}
