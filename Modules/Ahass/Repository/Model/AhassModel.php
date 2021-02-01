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
        $contacts = [];
        foreach ($request->contacts as $contact) {
            array_push($contacts, $contact['contact']);
        }

        $ahass = new Ahass();
        $ahass->name = $request->name;
        $ahass->address = $request->address;
        $ahass->regency_id = $request->city;
        $ahass->contacts = implode(', ', $contacts);
        return $ahass->save();
    }

    public function update($request, $id)
    {
        $contacts = [];
        foreach ($request->contacts as $contact) {
            array_push($contacts, $contact['contact']);
        }

        $ahass = $this->findById($id);
        $ahass->name = $request->name;
        $ahass->address = $request->address;
        $ahass->regency_id = $request->city;
        $ahass->contacts = implode(', ', $contacts);
        return $ahass->save();
    }

    public function delete($id)
    {
        $ahass = $this->findById($id);
        return $ahass->delete();
    }
}