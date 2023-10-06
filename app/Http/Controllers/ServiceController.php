<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Service;

class ServiceController extends Controller
{
    public function services(): JsonResponse
    {
        return response()->json(Service::all());
    }
}


