<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    protected $translator;
    protected $sourceLanguage = 'fr';
    protected $targetLanguages = ['en', 'es', 'pt'];

    public function __construct()
    {
        $this->translator = new GoogleTranslate();
        $this->translator->setSource($this->sourceLanguage);
    }

    /**
     * Traduire automatiquement tous les fichiers de langue
     */
    public function translateAll()
    {
        $sourcePath = lang_path($this->sourceLanguage);

        if (!File::exists($sourcePath)) {
            throw new \Exception("Le dossier de langue source n'existe pas : {$sourcePath}");
        }

        $files = File::files($sourcePath);
        $translated = 0;

        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $filename = $file->getFilename();
                $this->translateFile($filename);
                $translated++;
            }
        }

        return "✓ Traduction terminée : {$translated} fichier(s) traduit(s)";
    }

    /**
     * Traduire un fichier spécifique
     */
    public function translateFile($filename)
    {
        $sourcePath = lang_path($this->sourceLanguage . '/' . $filename);

        if (!File::exists($sourcePath)) {
            throw new \Exception("Le fichier source n'existe pas : {$sourcePath}");
        }

        $sourceContent = require $sourcePath;

        foreach ($this->targetLanguages as $targetLang) {
            $targetPath = lang_path($targetLang);

            // Créer le dossier si nécessaire
            if (!File::exists($targetPath)) {
                File::makeDirectory($targetPath, 0755, true);
            }

            echo "📝 Traduction de {$filename} vers {$targetLang}...\n";

            $translatedContent = $this->translateArray($sourceContent, $targetLang);

            // Sauvegarder le fichier traduit
            $targetFilePath = $targetPath . '/' . $filename;
            $this->saveTranslationFile($targetFilePath, $translatedContent);

            echo "✓ {$targetLang}/{$filename} créé avec succès\n";
        }
    }

    /**
     * Traduire récursivement un tableau
     */
    protected function translateArray(array $array, string $targetLang, $depth = 0)
    {
        $translated = [];
        $indent = str_repeat('  ', $depth);

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                echo "{$indent}  📂 Traduction de la section: {$key}\n";
                $translated[$key] = $this->translateArray($value, $targetLang, $depth + 1);
            } else {
                // Utiliser le cache pour éviter de retraduire
                $cacheKey = "translation.{$this->sourceLanguage}.{$targetLang}." . md5($value);

                $translated[$key] = Cache::remember($cacheKey, 86400 * 30, function () use ($value, $targetLang, $key, $indent) {
                    try {
                        $this->translator->setTarget($targetLang);

                        // Afficher la traduction en cours
                        echo "{$indent}    🔄 '{$key}': ";

                        // Pause pour éviter les limites de l'API (100ms)
                        usleep(100000);

                        $translation = $this->translator->translate($value);

                        echo "✓\n";

                        return $translation;
                    } catch (\Exception $e) {
                        echo "❌ Erreur: {$e->getMessage()}\n";
                        return $value; // Retourner la valeur originale en cas d'erreur
                    }
                });
            }
        }

        return $translated;
    }

    /**
     * Sauvegarder le fichier de traduction avec formatage propre
     */
    protected function saveTranslationFile($path, array $content)
    {
        $export = "<?php\n\nreturn " . $this->varExportShort($content, true) . ";\n";
        File::put($path, $export);
    }

    /**
     * var_export plus propre
     */
    protected function varExportShort($var, $return = false)
    {
        $export = var_export($var, true);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
        $export = join(PHP_EOL, array_filter(["["] + $array));

        if ((bool)$return) return $export;
        else echo $export;
    }

    /**
     * Traduire une seule clé
     */
    public function translateSingle($text, $targetLang)
    {
        $cacheKey = "translation.{$this->sourceLanguage}.{$targetLang}." . md5($text);

        return Cache::remember($cacheKey, 86400 * 30, function () use ($text, $targetLang) {
            try {
                $this->translator->setTarget($targetLang);
                return $this->translator->translate($text);
            } catch (\Exception $e) {
                return $text;
            }
        });
    }

    /**
     * Vider le cache des traductions
     */
    public function clearCache()
    {
        $keys = Cache::get('translation_cache_keys', []);
        foreach ($keys as $key) {
            Cache::forget($key);
        }
        Cache::forget('translation_cache_keys');

        return "Cache des traductions vidé";
    }
}
