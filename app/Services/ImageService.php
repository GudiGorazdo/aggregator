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
            self::createWidthSet($image, $name, $folderPath, $additionalType);

            return $name;

        } catch (Exception $error) {

            foreach (self::SIZES as $sizeName => $size) {
                $path = $folderPath . '/' . $sizeName . '/' . $name . '.';
                if (file_exists($path . $extention)) {
                    unlink($path . $extention);
                }
                if (file_exists($path . $additionalType)) {
                    unlink($path . $additionalType);
                }
            }

            \App\Helpers::log($error->getMessage(), __DIR__ . '/ImageServiceErrors');
        }

        return false;
    }

    private static function createWidthSet($image, string $name, string $folderPath, string $additionalType)
    {
        $nameOriginal = $name . '.' . self::EXTENTIONS[$image->mime()];
        $nameAdditional = $name . '.' . $additionalType;
        $width = +$image->width();

        foreach (self::SIZES as $sizeName => $size) {
            if ($width <= self::SIZES['sm'] && $size !== self::SIZES['lg']) continue;

            $imageOriginal = Image::make($image);
            $imageAdditional = Image::make($image)->encode($additionalType, 80);

            if ($size !== self::SIZES['lg'] && !($width <= self::SIZES['sm'])) {
                if (!($width > $size)) continue;

                $imageOriginal->widen($size);
                $imageAdditional->widen($size);
            }

            $path = $folderPath . '/' . $sizeName . '/';

            if (!file_exists($path)) mkdir($path, 0755, true);
            $imagePathOriginal = $path . $nameOriginal;
            $imagePathAdditional = $path . $nameAdditional;

            $imageOriginal->save($imagePathOriginal, 80);
            $imageAdditional->save($imagePathAdditional);
        }
    }
}
