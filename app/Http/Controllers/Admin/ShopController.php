<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use \App\Http\Controllers\Controller;
use \App\Models\Shop;
use \App\Models\Service;
use \App\Services\ImageSetService;
use \App\Models\Category;

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
        $categories = Category::with('subCategories')->get()->toArray();
        foreach($categories as $ind => $category) {
            $categoryKey = array_search((int)$category['id'], array_column($data['prices'], 'category_id'));
            if (!$categoryKey && $categoryKey !== 0) continue; 
            foreach($category['sub_categories'] as $index => $subCategory) {
                $subCategoryKey = null;
                if (isset($data['prices'][$categoryKey]['data'])) {
                    $subCategoryKey = array_search((int)$subCategory['id'], array_column($data['prices'][$categoryKey]['data'], 'sub_category_id'));
                }
                if (!$subCategoryKey && $subCategoryKey !== 0) continue; 
                $categories[$ind]['sub_categories'][$index]['active'] = true;
                $categories[$ind]['sub_categories'][$index]['price'] = $data['prices'][$categoryKey]['data'][$subCategoryKey]['price'];
            }
        }

        return view('pages.admin.shop.edit.index', [
            'coord' => $data['coord'],
            'shop' => $shop,
            'photos' => $data['photos'],
            'services' => $data['services'],
            'workingMode' => $data['workingMode'],
            'prices' => $data['prices'],
            'additionalPhones' => $data['additionalPhones'],
            'categories' => $categories
        ]);
    }

    private function syncPhotos(Request $request, ImageSetService $imageService, array $oldPhotos, int $shop_id)
    {
        $photos = $request->file('photos');
        $photosToDelete = $request->input('delete_photos') ?? [];
        $arrPhotos = [
            'uploaded' => [],
            'errors' => []
        ];
        if ($photos) {
            foreach($photos as $photo) {
                $imgData = $imageService::saveToStorage($photo, storage_path(self::PHOTOS_PATH) . $shop_id);
                if ($imgData) {
                    $arrPhotos['uploaded'][$imgData['name']] = $imgData['sizes'];
                } else {
                    $arrPhotos['errors'][] = $photo->getClientOriginalName();
                }
            }
        }
        if (!empty($photosToDelete)) {
          foreach ($photosToDelete as $deletePhoto) {
            unset($oldPhotos[$deletePhoto]);
            $imageService::removeByName($deletePhoto, storage_path(self::PHOTOS_PATH) . $shop_id);
          }
        }
        $photos = array_merge($oldPhotos, $arrPhotos['uploaded']);

        return $photos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response */
    public function update(Request $request, ImageSetService $imageService, $id)
    {
        $shop = Shop::getById((int)$id)->get()->first();
        $data = $request->all();

        //Если в запросе только файл и метод - значит что это предзагрузка фоток
        //Если продолжить выполненин функции, то будет ошибка и в итоге фотки не загрузятся
        if (isset($data['file']) && count($data) < 3) return;

        $shop->description = $data['description'];
        $shop->coord = json_encode([
            'lat' => $data['latitude'],
            'long' => $data['longitude']
        ]);
        $shop->address = $data['address'];
        $shop->phone = $data['phone'];
        $shop->additional_phones = json_encode($data['additional_phones']);
        $shop->telegram = $data['telegram'];
        $shop->whatsapp = $data['whatsapp'];
        $shop->web = json_encode($data['web']);
        $this->syncServicesInfo((array)json_decode($data['services']), (int)$id);
        $this->syncWorkMode((array)json_decode($data['work_mode']), (int)$id);
        $this->syncCategories((array)$data['sub_categories'], $shop);

        //return response(['ok' => true]);
        \App\Helpers::log($data, __DIR__);
        $photos = $this->syncPhotos(
            $request,
            $imageService,
            $shop->photos ? (array)json_decode($shop->photos) : [],
            (int)$id
        );
        $shop->photos = json_encode($photos);
        $shop->save();

        $content = view('pages.admin.shop.edit.photos-list-items', ['photos' => $photos, 'shop' => $shop])->render();

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

    public function syncCategories(array $categories, Shop $shop)
    {
        $shopCategories = $shop->subCategories->keyBy('id');
        $categories = collect($categories)->keyBy(function($item) { return $item; });
        $categoriesToPush = $categories->diffKeys($shopCategories);
        $categoriesToDelete = $shopCategories->diffKeys($categories);

        foreach($categoriesToPush as $category) {
            $shop->subCategories()->attach($category);
        }

        foreach($categoriesToDelete as $category) {
            $shop->subCategories()->detach($category);
        }
    }

    private function syncWorkMode(array $modes, int $shop_id): void
    {
        foreach($modes as $day => $mode) {
            $rec = \Illuminate\Support\Facades\DB::table('shop_working_modes')
                ->where('shop_id', $shop_id)
                ->where('day_of_week', (int)$day)
            ;
            if ($rec->get()->first()) { 
                $rec->update([
                    'is_open' => (int)$mode->is_open,
                    'open_time' => $mode->open,
                    'close_time' => $mode->close,
                ]);
            }
        }
    }


    private function syncServicesInfo(array $services, int $shop_id): void
    {
        foreach($services as $service) {
            $rec = \Illuminate\Support\Facades\DB::table('service_shop')
                ->where('shop_id', $shop_id)
                ->where('service_id', (int)$service->id)
            ;
            if ($rec->get()->first()) { 
                $rec->update(['rating' => number_format($service->rating, 2)]); 
            }
        } 
    }

    public function photosPreload()
    {
        \App\Helpers::log('asdkfasdf', __DIR__);
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
