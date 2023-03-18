<?php

namespace App\Services;

use Exception;
use Intervention\Image\Facades\Image;

class ImageService
{
    private const EXTENTIONS = [
        "image/png" => 'png',
        "image/jpeg" => 'jpg',
        "image/jpg" => 'jpg',
        "image/webp" => 'webp'
    ];

    private const SIZES = [
        'lg' => 1200,
        'md' => 992,
        'sm' => 576,
    ];

    public static function saveToStorage($image, string $folderPath): string|bool
    {
        try {
            $name = hash('sha256', (string)microtime(true));
            $image = Image::make($image);
            $extention = self::EXTENTIONS[$image->mime()];
            $additionalType = $extention != 'webp' ? 'webp' : 'jpg';

            self::saveImage(Image::make($image), $name, $folderPath . '/', $extention);
            self::saveImage(Image::make($image)->encode($additionalType), $name, $folderPath . '/', $additionalType);
            self::createWidthSet($image, $name, $folderPath, $additionalType);

            return $extention != 'webp'
                ? $name . '.' . $extention
                : $name . '.' . $additionalType
            ;

        } catch (Exception $error) {
            $path = $folderPath . '/' . $name . '.';

            self::removeImage($path . $extention);
            self::removeImage($path . $additionalType);

            foreach (self::SIZES as $sizeName => $size) {
                $path = $folderPath . '/' . $sizeName . '/' . $name . '.';
                self::removeImage($path . $extention);
                self::removeImage($path . $additionalType);
            }

            \App\Helpers::log($error->getMessage(), __DIR__ . '/ImageServiceErrors');
        }

        return false;
    }

    private static function createWidthSet($image, string $name, string $folderPath): void
    {
        $width = +$image->width();

        foreach (self::SIZES as $sizeName => $size) {
            if (!($width > $size)) continue;
            $path = $folderPath . '/' . $sizeName . '/';
            self::saveImage(
                Image::make($image)->encode("webp")->widen($size),
                $name,
                $path,
                self::EXTENTIONS[$image->mime()]
            );
        }
    }

    private static function saveImage($image, string $name, string $path, string $type): void
    {
        $fullName = $name . '.' . $type;
        if (!file_exists($path)) mkdir($path, 0755, true);
        $imagePath = $path . $fullName;
        $image->save($imagePath, 80);
    }

    private static function removeImage(string $path): void
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
