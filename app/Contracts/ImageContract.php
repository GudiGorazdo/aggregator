<?php
namespace App\Contracts;

interface ImageContract
{
    const EXTENTIONS = [
        "image/png" => 'png',
        "image/jpeg" => 'jpg',
        "image/jpg" => 'jpg',
        "image/webp" => 'webp'
    ];

    const MIMES = [
        'png' => "image/png",
        'jpeg' => "image/jpeg",
        'jpg' => "image/jpg",
        'webp' => "image/webp"
    ];

    const SIZES = [
        'sm' => 576,
        'md' => 992,
        'lg' => 1200,
    ];

    const MAX_WIDTH = 1920;

    public static function removeByName(string $name, string $path): void;
    public static function saveToStorage($image, string $folderPath): array|bool;
}

