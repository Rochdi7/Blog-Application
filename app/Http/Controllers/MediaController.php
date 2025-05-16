<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function show($uuid, $id, $fileName)
    
    {
        
        $media = Media::where('uuid', $uuid)
                      ->where('id', $id)
                      ->firstOrFail();

        if ($media->file_name !== $fileName) {
            abort(404); 
        }

        return Response::file($media->getPath());
    }

    public function shortShow($shortUuid, $id, $fileName)
    {
        $media = Media::findOrFail($id);

        if (!str_starts_with($media->uuid, $shortUuid) || $media->file_name !== $fileName) {
            abort(404);
        }

        return Response::file($media->getPath());
    }
}
