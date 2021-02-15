<?php

namespace Modules\Accessories\Repository\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Accessories\Repository\AccessoryRepositoryInterface;
use Modules\Accessories\Repository\Model\Entities\Accessory;

class AccessoryModel implements AccessoryRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        return Accessory::where('id', $id)->firstOrFail();
    }

    public function findBySlugName($slug)
    {
        return Accessory::where('name', $slug)->firstOrFail();
    }

    public function create($request)
    {
        $accessory = new Accessory();
        $accessory->id = Str::uuid()->getHex();
        $accessory->products_id = $request->product;
        $accessory->parts_number = $request->parts_number;
        $accessory->name = $request->name;
        $accessory->slug_name = Str::slug($request->name);
        $accessory->function = $request->function;
        $accessory->colors = implode(',', $request->colors);
        $accessory->material = $request->material;
        $accessory->price = $request->price;
        if ($request->file('image')) {
            $accessory->image = $this->uploadFile($request->file('image'));
        }
        $accessory->show_in_catalogue = $request->show_in_catalogue ? 1 : 0;
        return $accessory->save();
    }

    public function update($request, $id)
    {
        $accessory = $this->findById($id);
        $accessory->products_id = $request->product;
        $accessory->parts_number = $request->parts_number;
        $accessory->name = $request->name;
        $accessory->slug_name = Str::slug($request->name);
        $accessory->function = $request->function;
        $accessory->colors = implode(',', $request->colors);
        $accessory->material = $request->material;
        $accessory->price = $request->price;
        if ($request->file('image')) {
            $accessory->image = $this->uploadFile($request->file('image'));
        }
        $accessory->show_in_catalogue = $request->show_in_catalogue ? 1 : 0;
        return $accessory->save();
    }

    public function delete($id)
    {
        $accessory = $this->findById($id);
        $this->removeFile($accessory->image);
        return $accessory->delete();
    }

    protected function uploadFile($fileName)
    {
        if ($fileName !== null) {
            $name = 'acc_' . time() . '_' . random_int(100, 999) . '.' . $fileName->getClientOriginalExtension();
            $fileName->move(storage_path('app/public/images/honda/accessories/'), $name);
            return $name;
        }
    }

    protected function removeFile($fileName)
    {
        $storage = Storage::disk('accessories');
        return $storage->delete($fileName);
    }
}