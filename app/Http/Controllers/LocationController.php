<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;
use App\Models\Subway;
use Exception;

class LocationController extends Controller
{
    public $errors = [];
    public $response;
    public function cities()
    {
        try {
            $this->response = City::getAll()->get();
        } catch (Exception $error) {
            $this->errors[] = 'get city error';
        }
        $this->showJsonResponse();
    }

    public function areas($id)
    {
        // \App\Services\Helper::log($id, __DIR__);
        try {
            $this->response = Area::getByCityId((int)$id)->get();
        } catch (Exception $error) {
            $this->errors[] = 'get areas error';
        }
        $this->showJsonResponse();
    }

    public function subways(Request $req)
    {
        // \App\Services\Helper::log($req->query('id'), __DIR__);
        $ids = $req->query('id') ?? [];
        for ($i = 0; $i < count($ids); $i++) {
            $ids[$i] = (int)$ids[$i];
        }
        try {
            $this->response = Subway::getByAreasIds($ids)->get();
        } catch (Exception $error) {
            $this->errors[] = 'get areas error';
        }
        $this->showJsonResponse();
    }

    public function showJsonResponse()
    {
        header('Content-Type: application/json');
        if (empty($this->errors)) {
            echo json_encode($this->response);
        } else {
            echo json_encode($this->errors);
        }
    }
}
