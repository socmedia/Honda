<?php
namespace Modules\Ahass\Repository\Model;

use Modules\Ahass\Repository\AhassRepositoryInterface;
use Modules\Ahass\Repository\Model\Entities\Ahass;

class AhassModel implements AhassRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        $ahass = Ahass::findOrFail($id);
        return $ahass;
    }

    public function create($request)
    {
        $ahass = new Ahass();
        $ahass->name = $request->name;
        $ahass->regency_id = $request->city;
        $ahass->address = $request->address;
        $ahass->phone_1 = $request->phone_1;
        $ahass->phone_2 = $request->phone_2;
        return $ahass->save();
    }

    public function update($request, $id)
    {
        $ahass = $this->findById($id);
        $ahass->name = $request->name;
        $ahass->regency_id = $request->city;
        $ahass->address = $request->address;
        $ahass->phone_1 = $request->phone_1;
        $ahass->phone_2 = $request->phone_2;
        return $ahass->save();
    }

    public function delete($id)
    {
        $ahass = $this->findById($id);
        return $ahass->delete();
    }
}