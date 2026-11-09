<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use RuntimeException;

/**
 * Instructor approval required for Intervention Image v3.
 * Only the processed 360x360 WEBP image is saved on the public disk.
 * The database stores only the path returned by this service.
 */
class AvatarService
{
    public function prepare(UploadedFile $upload): string
    {
        $manager = new ImageManager(new Driver());

        $thumbnail = $manager
            ->read($upload->getRealPath())
            ->cover(360, 360)
            ->toWebp(82);

        $path = 'avatars/' . Str::uuid() . '.webp';

        if (! Storage::disk('public')->put($path, (string) $thumbnail)) {
            throw new RuntimeException('Unable to save the prepared avatar.');
        }

        return $path;
    }
}
