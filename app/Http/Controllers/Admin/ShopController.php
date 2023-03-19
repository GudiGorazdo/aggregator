<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;
use App\Services\ImageService;


class ShopController extends Controller
{
    use \App\Http\Controllers\Traits\ShopTrait;

    public const PHOTOS_PATH = 'app/public/uploads/images/shops/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    // public function getShopsByName(Request $request)
    public function getShopsByName(string $name)
    {
        $shops = Shop::getByName($name)->get()->toArray();
        // $shops = Shop::getByName($request->input('title'))->get()->toArray();
        if ($shops) return response()->json(['ok' => true, 'shops' => $shops]);
        else return response([ 'ok' => false ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, string $id)
    {
        $shop = Shop::getById((int)$id)->get()->first();
        if (!$shop) return redirect()->route('undefined');
        $data = $this->getShopData($shop);

        return view('pages.admin.shop.edit', [
            'shop' => $shop,
            'photos' => $data['photos'],
            'services' => $data['services'],
            'workingMode' => $data['workingMode'],
            'prices' => $data['prices'],
            'additionalPhones' => $data['additionalPhones'],
        ]);
    }

    public function deletePhotos(Request $request)
    {
        $shop = Shop::getById((int)$request->input('id'))->get()->first();
        $photos = $request->input('delete_photos');
        $shop->photos = json_encode($photos);
        $shop->save();
        $content = view('pages.admin.shop.photos-list-items', ['photos' => $photos, 'shop' => $shop])->render();

        return response(
            [
              'ok' => true, 
              'count' => count($photos), 
              'items' => $content
            ], 
            200, 
            [ 'Content-Type' => 'application/json' ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response */ public function update(Request $request, ImageService $imageService, $id)
    {
        $photos = $request->file('photos');
        $photosToDelete = $request->input('delete_photos') ?? [];
        $arrPhotos = [
            'uploaded' => [],
            'errors' => []
        ];
        if ($photos) {
            foreach($photos as $photo) {
                $imgData = $imageService::saveToStorage($photo, storage_path(self::PHOTOS_PATH) . $id);
                if ($imgData) {
                    $arrPhotos['uploaded'][$imgData['name']] = $imgData['sizes'];
                } else {
                    $arrPhotos['errors'][] = $photo->getClientOriginalName();
                }
            }
        }

        $shop = Shop::getById((int)$id)->get()->first();
        $oldPhotos = $shop->photos ? (array)json_decode($shop->photos) : [];
        if (!empty($photosToDelete)) {
          foreach ($photosToDelete as $deletePhoto) {
            unset($oldPhotos[$deletePhoto]);
            $imageService::deleteByName($deletePhoto, storage_path(self::PHOTOS_PATH) . $id);
          }
        }
        $photos = array_merge($oldPhotos, $arrPhotos['uploaded']);
        $shop->photos = json_encode($photos);
        $shop->save();
        $content = view('pages.admin.shop.photos-list-items', ['photos' => $photos, 'shop' => $shop])->render();
        return response(
            [
              'ok' => true, 
              'count' => count($photos), 
              'items' => $content
            ], 
            200, 
            [ 'Content-Type' => 'application/json' ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
