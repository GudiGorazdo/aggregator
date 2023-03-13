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
            $width = +$image->width();

            $nameOriginal = $name . '.' . self::EXTENTIONS[$image->mime()];
            if (self::EXTENTIONS[$image->mime()] != 'webp') {
                $nameWebp = $name . '.webp';
            } else {
                $nameJpg = $name . '.jpg';
            }

            foreach (self::SIZES as $sizeName => $size) {
                if ($width <= self::SIZES['sm'] && $size !== self::SIZES['lg']) continue;

                $imageOriginal = Image::make($image);

                if ($nameWebp) {
                    $imageWebp = Image::make($image)->encode('webp', 80);
                } else {
                    $imageJpg = Image::make($image)->encode('jpg', 80);
                }

                if (!is_null($size) && !($width <= self::SIZES['sm'])) {
                    if ($width > $size) {
                        $imageOriginal->widen($size);
                        if (isset($imageWebp)) $imageWebp->widen($size);
                        else $imageJpg->widen($size);
                    } else {
                        continue;
                    }
                }

                $path = $folderPath . '/' . $sizeName . '/';

                if (!file_exists($path)) mkdir($path, 0755, true);
                $imagePathOriginal = $path . $nameOriginal;

                if (isset($nameWebp)) {
                    $imagePathWebp = $path . $nameWebp;
                } else {
                    $imagePathJpg = $path . $nameJpg;
                }

                $imageOriginal->save($imagePathOriginal, 80);
                if (isset($imagePathWebp)) {
                    $imageWebp->save($imagePathWebp);
                } else {
                    $imageJpg->save($imagePathJpg);
                }
            }

            return $name;

        } catch (Exception $error) {

            foreach (self::SIZES as $sizeName => $size) {
                $path = $folderPath . '/' . $sizeName . '/';

                if (file_exists($path . $nameOriginal)) {
                    unlink($path . $nameOriginal);
                }
                if (isset($nameWebp) && file_exists($path . $nameWebp)) {
                    unlink($path . $nameWebp);
                }
                if (isset($nameJpg) && file_exists($path . $nameJpg)) {
                    unlink($path . $nameJpg);
                }
            }

            \App\Helpers::log($error->getMessage(), __DIR__ . '/ImageServiceErrors');
        }

        return false;
    }
}
