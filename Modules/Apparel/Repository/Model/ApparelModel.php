<?php

namespace Modules\Apparel\Repository\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Apparel\Repository\ApparelRepositoryInterface;
use Modules\Apparel\Repository\Model\Entities\Apparel;
use Modules\Apparel\Repository\Model\Entities\ApparelHasImage;

class ApparelModel implements ApparelRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        return Apparel::where('id', $id)->with('images')->firstOrFail();
    }

    public function findByImageId($id)
    {
        return ApparelHasImage::where('id', $id)->firstOrFail();
    }

    public function create($request)
    {
        $apparel = new Apparel();
        $apparel->name = $request->name;
        $apparel->slug_name = Str::slug($request->name);
        $apparel->category = $request->category;
        $apparel->thumbnail = $this->uploadImage($request->file('thumbnail'));
        $apparel->price = $request->price;
        $apparel->sizes = $request->sizes;
        $apparel->materials = $request->materials;
        $apparel->is_active = 1;
        $apparel->save();

        if ($request->file('images')) {
            return $this->createImage($request);
        }
    }

    public function createImage($request, $id = null, $method = 'POST')
    {
        if ($method === 'PUT') {
            return ApparelHasImage::create([
                'apparels_id' => $id,
                'image' => $this->uploadImage($request->file('image')),
            ]);
        }

        $apparel = Apparel::where('name', $request->name)->firstOrFail();
        foreach ($request->file('images') as $i => $image) {
            ApparelHasImage::create([
                'apparels_id' => $apparel->id,
                'image' => $this->uploadImage($image['image']),
            ]);
        }
    }

    public function update($request, $id)
    {
        $apparel = $this->findById($id);
        $apparel->name = $request->name;
        $apparel->slug_name = Str::slug($request->name);
        $apparel->category = $request->category;

        if ($request->file('thumbnail')) {
            $this->removeImage($apparel->thumbnail);
            $apparel->thumbnail = $this->uploadImage($request->file('thumbnail'));
        }

        $apparel->sizes = $request->sizes;
        $apparel->price = $request->price;
        $apparel->materials = $request->materials;
        $apparel->is_active = 1;
        return $apparel->save();
    }

    public function delete($id)
    {
        $apparel = $this->findById($id);

        if ($apparel->images) {
            foreach ($apparel->images as $image) {
                $this->removeImage($image->image);
            }
        }

        $this->removeImage($apparel->thumbnail);
        return $apparel->delete();
    }

    public function deleteImage($id)
    {
        $image = $this->findByImageId($id);
        $this->removeImage($image->image);
        return $image->delete();
    }

    protected function uploadImage($inputName)
    {
        if ($inputName !== null) {
            $name = 'apr_' . time() . '_' . random_int(100, 999) . '.' . $inputName->getClientOriginalExtension();
            $inputName->move(storage_path('app/public/images/honda/apparels/'), $name);
            return $name;
        }
    }

    protected function removeImage($imageName)
    {
        $storage = Storage::disk('apparels');
        return $storage->delete($imageName);
    }
}