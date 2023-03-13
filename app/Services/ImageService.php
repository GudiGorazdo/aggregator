<?php

namespace App\Services;

use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
            // $imageOriginal = Image::make($image);

            // if (self::EXTENTIONS[$imageOriginal->mime()] != 'webp') {
            //     $imageWebp = Image::make($image)->encode('webp', 70);
            // } else {
            //     $imageJpg = Image::make($image)->encode('jpg', 70);
            // }

            // $name = hash('sha256', (string)microtime(true));

            // $nameOriginal = $name . '.' . self::EXTENTIONS[$imageOriginal->mime()];
            // if (isset($imageWebp)) {
            //     $nameWebp = $name . '.webp';
            // } else {
            //     $nameJpg = $name . '.jpg';
            // }

            // if (!file_exists($folderPath)) mkdir($folderPath, 0755, true);
            // $imagePathOriginal = $folderPath . '/' . $nameOriginal;

            // if (isset($nameWebp)) {
            //     $imagePathWebp = $folderPath . '/' . $nameWebp;
            // } else {
            //     $imagePathJpg = $folderPath . '/' . $nameJpg;
            // }

            // $imageOriginal->save($imagePathOriginal);
            // if (isset($imagePathWebp)) {
            //     $imageWebp->save($imagePathWebp);
            // } else {
            //     $imageJpg->save($imagePathJpg);
            // }

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
                $imageOriginal = Image::make($image);

                if ($nameWebp) {
                    $imageWebp = Image::make($image)->encode('webp', 80);
                } else {
                    $imageJpg = Image::make($image)->encode('jpg', 80);
                }

                \App\Helpers::log(!is_null($size), __DIR__);

                if (!is_null($size)) {
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
            // if (file_exists($imagePathOriginal)) {
            //     unlink($imagePathOriginal);
            // }
            // if (isset($imagePathWebp) && file_exists($imagePathWebp)) {
            //     unlink($imagePathWebp);
            // }
            // if (isset($imagePathJpg) && file_exists($imagePathJpg)) {
            //     unlink($imagePathJpg);
            // }

            \App\Helpers::log($error->getMessage(), __DIR__ . '/ImageServiceErrors');
        }

        return false;
    }
}
