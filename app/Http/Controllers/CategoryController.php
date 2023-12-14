<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public $errors = [];
    public $response;

    public function allCategories(): Response
    {
        return response(\App\Models\Category::with('subCategories')->get());
    }
}


