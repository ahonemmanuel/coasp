<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventGallery;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class EventGalleryController extends Controller
{
    public function index()
    {
        $galleries = EventGallery::withCount('photos')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        // Gérer is_active séparément (checkbox)
        $validated['is_active'] = $request->has('is_active');

        $gallery = EventGallery::create($validated);

        return redirect()
            ->route('admin.galleries.edit', $gallery)
            ->with('success', 'Galerie créée avec succès. Vous pouvez maintenant ajouter des photos.');
    }

    public function edit(EventGallery $gallery)
    {
        $gallery->load('photos');
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, EventGallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        // Gérer is_active séparément (checkbox)
        $validated['is_active'] = $request->has('is_active');

        $gallery->update($validated);

        return redirect()
            ->route('admin.galleries.edit', $gallery)
            ->with('success', 'Galerie mise à jour avec succès.');
    }

    public function destroy(EventGallery $gallery)
    {
        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Galerie supprimée avec succès.');
    }

    public function uploadPhotos(Request $request, EventGallery $gallery)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $uploadedCount = 0;

        if ($request->hasFile('photos')) {
            $lastOrder = $gallery->photos()->max('order') ?? 0;

            foreach ($request->file('photos') as $photo) {
                $filename = time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('galleries/' . $gallery->slug, $filename, 'public');

                GalleryPhoto::create([
                    'event_gallery_id' => $gallery->id,
                    'image_path' => $path,
                    'order' => ++$lastOrder,
                ]);

                $uploadedCount++;
            }
        }

        return redirect()
            ->route('admin.galleries.edit', $gallery)
            ->with('success', "$uploadedCount photo(s) téléversée(s) avec succès.");
    }

    public function deletePhoto(GalleryPhoto $photo)
    {
        $galleryId = $photo->event_gallery_id;
        $photo->delete();

        return redirect()
            ->route('admin.galleries.edit', $galleryId)
            ->with('success', 'Photo supprimée avec succès.');
    }

    public function updatePhotoOrder(Request $request, EventGallery $gallery)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer',
        ]);

        foreach ($request->orders as $photoId => $order) {
            GalleryPhoto::where('id', $photoId)
                ->where('event_gallery_id', $gallery->id)
                ->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function downloadGallery(EventGallery $gallery)
    {
        $photos = $gallery->photos;

        if ($photos->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'Aucune photo à télécharger.');
        }

        $zipFileName = Str::slug($gallery->title) . '_' . date('Y-m-d') . '.zip';
        $zipPath = storage_path('app/temp/' . $zipFileName);

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($photos as $index => $photo) {
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

    public function toggleStatus(EventGallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        return redirect()
            ->back()
            ->with('success', 'Statut mis à jour avec succès.');
    }
}
