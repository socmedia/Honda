<?php

namespace Modules\HGP\Repository\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\HGP\Repository\GenuinePartRepositoryInterface;
use Modules\HGP\Repository\Model\Entities\GenuinePart;
use Modules\HGP\Repository\Model\Entities\GenuinePartHasAdvantage;

class GenuinePartModel implements GenuinePartRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        return GenuinePart::where('id', $id)->with('advantages')->firstOrFail();
    }

    public function create($request)
    {
        $hgp = new GenuinePart();
        $hgp->name = $request->name;
        $hgp->slug_name = Str::slug($request->name);
        $hgp->thumbnail = $this->uploadImage($request->file('thumbnail'));

        if ($request->file('description_image')) {
            $hgp->description_image = $this->uploadImage($request->file('description_image'));
        }

        $hgp->description = $request->description;

        if ($request->file('function_image')) {
            $hgp->function_image = $this->uploadImage($request->file('function_image'));
        }

        $hgp->function = $request->function;
        $hgp->save();

        $genuine_part = GenuinePart::latest()->first();
        $id = $genuine_part->id;

        foreach ($request->advantages as $advantage) {
            GenuinePartHasAdvantage::create([
                'genuine_parts_id' => $id,
                'title' => $advantage['advantage_name'],
                'description' => $advantage['advantage_description'],
            ]);
        }

        return;
    }

    public function update($request, $id)
    {
        $hgp = $this->findById($id);
        $hgp->name = $request->name;
        $hgp->slug_name = Str::slug($request->name);

        if ($request->file('thumbnail')) {
            $hgp->thumbnail = $this->uploadImage($request->file('thumbnail'));
        }

        if ($request->file('description_image')) {
            $hgp->description_image = $this->uploadImage($request->file('description_image'));
        }

        $hgp->description = $request->description;

        if ($request->file('function_image')) {
            $hgp->function_image = $this->uploadImage($request->file('function_image'));
        }

        $hgp->function = $request->function;
        return $hgp->save();
    }

    public function createAdvantage($request, $id)
    {
        $advantage = new GenuinePartHasAdvantage();
        $advantage->genuine_parts_id = $id;
        $advantage->title = $request->c_advantage_name;
        $advantage->description = $request->c_advantage_description;
        return $advantage->save();
    }

    public function updateAdvantage($request, $advantageId)
    {
        $advantage = GenuinePartHasAdvantage::findOrFail($advantageId);
        $advantage->title = $request->advantage_name;
        $advantage->description = $request->advantage_description;
        return $advantage->save();
    }

    public function delete($id)
    {
        $hgp = $this->findById($id);
        $this->deleteImage($hgp->thumbnail);
        $this->deleteImage($hgp->description_image);
        $this->deleteImage($hgp->function_image);
        return $hgp->delete();
    }

    public function deleteAdvantage($advantageId)
    {
        $advantage = GenuinePartHasAdvantage::findOrFail($advantageId);
        return $advantage->delete();
    }

    protected function uploadImage($inputName)
    {
        $name = 'hgp_' . time() . '_' . random_int(100, 999) . '.' . $inputName->getClientOriginalExtension();
        $inputName->move(storage_path('app/public/images/honda/genuine_parts/'), $name);
        return $name;
    }

    protected function deleteImage($imageName)
    {
        $storage = Storage::disk('genuine_parts');
        return $storage->delete($imageName);
    }
}