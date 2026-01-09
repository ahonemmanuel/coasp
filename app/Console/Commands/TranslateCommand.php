<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TranslationService;

class TranslateCommand extends Command
{
    protected $signature = 'translate:auto
                            {--file= : Fichier spécifique à traduire (ex: menu.php)}
                            {--force : Forcer la retraduction même si le cache existe}
                            {--clear-cache : Vider le cache des traductions}';

    protected $description = 'Traduire automatiquement les fichiers de langue du français vers EN, ES, PT';

    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        parent::__construct();
        $this->translationService = $translationService;
    }

    public function handle()
    {
        $this->info('');
        $this->info('🌍 ================================');
        $this->info('   COASP - Traduction Automatique');
        $this->info('================================');
        $this->info('');

        // Vider le cache si demandé
        if ($this->option('clear-cache')) {
            $this->info('🗑️  Suppression du cache...');
            $this->translationService->clearCache();
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            $this->info('✓ Cache vidé avec succès');
            $this->info('');
        }

        try {
            if ($file = $this->option('file')) {
                // Traduire un fichier spécifique
                $this->info("📄 Traduction du fichier : {$file}");
                $this->info('');

                $this->translationService->translateFile($file);

                $this->info('');
                $this->info("✅ Fichier traduit avec succès !");

            } else {
                // Traduire tous les fichiers
                $this->info("📚 Traduction de tous les fichiers de langue...");
                $this->info('');

                $result = $this->translationService->translateAll();

                $this->info('');
                $this->info("✅ {$result}");
            }

            $this->info('');
            $this->info('🎉 Traduction terminée !');
            $this->info('');

            // Afficher les langues créées
            $this->table(
                ['Langue', 'Code', 'Statut'],
                [
                    ['English', 'en', '✓'],
                    ['Español', 'es', '✓'],
                    ['Português', 'pt', '✓'],
                ]
            );

        } catch (\Exception $e) {
            $this->error('');
            $this->error('❌ Erreur : ' . $e->getMessage());
            $this->error('');
            return 1;
        }

        return 0;
    }
}
