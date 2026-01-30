<?php

namespace App\Http\Controllers;

use App\Models\EventGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ZipArchive;

class GalleryController extends Controller
{
    /**
     * Afficher la liste de toutes les galeries actives
     */
    public function index()
    {
        $galleries = EventGallery::where('is_active', true)
            ->withCount('photos')
            ->orderBy('order')
            ->orderBy('event_date', 'desc')
            ->paginate(12);

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Afficher les détails d'une galerie spécifique
     */
    public function show($slug)
    {
        $gallery = EventGallery::where('slug', $slug)
            ->where('is_active', true)
            ->with('photos')
            ->firstOrFail();

        return view('gallery.show', compact('gallery'));
    }

    /**
     * Télécharger toutes les photos d'une galerie en ZIP
     */
    public function download($slug)
    {
        $gallery = EventGallery::where('slug', $slug)
            ->where('is_active', true)
            ->with('photos')
            ->firstOrFail();

        if ($gallery->photos->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'Cette galerie ne contient aucune photo à télécharger.');
        }

        $zipFileName = Str::slug($gallery->title) . '_' . date('Y-m-d') . '.zip';
        $zipPath = storage_path('app/temp/' . $zipFileName);

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($gallery->photos as $index => $photo) {
                $filePath = storage_path('app/public/' . $photo->image_path);

                if (file_exists($filePath)) {
                    $extension = pathinfo($photo->image_path, PATHINFO_EXTENSION);
                    $photoName = ($index + 1) . '_' . Str::slug($photo->title ?: $gallery->title) . '.' . $extension;
                    $zip->addFile($filePath, $photoName);
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
