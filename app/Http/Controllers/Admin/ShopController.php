<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    use \App\Http\Controllers\Traits\ShopTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    public function getNames(Request $request)
    {
        $shops = Shop::getByName($request->input('title'))->get()->toArray();
        return response()->json(['ok' => true, 'shops' => $shops]);
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
    public function edit(string $id)
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

    public function updatePhotos(Request $request)
    {
        $shop = Shop::getById((int)$request->input('id'))->get()->first();
        $photos = $request->input('update_photos');
        $shop->photos = json_encode($photos);
        $shop->save();
        $content = view('pages.admin.shop.photos', ['photos' => $photos, 'shop' => $shop])->render();

        return response(['ok' => true, 'count' => count($photos), 'items' => $content], 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
