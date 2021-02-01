<?php

namespace Modules\Dealer\Repository\Model;

use Modules\Dealer\Repository\DealerRepositoryInterface;
use Modules\Dealer\Repository\Model\Entities\Dealer;

class DealerModel implements DealerRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        $dealer = Dealer::findOrFail($id);
        return $dealer;
    }

    public function create($request)
    {
        $contacts = [];
        foreach ($request->contacts as $contact) {
            array_push($contacts, $contact['contact']);
        }
        $dealer = new Dealer();
        $dealer->name = $request->name;
        $dealer->address = $request->address;
        $dealer->regency_id = $request->city;
        $dealer->contacts = implode(', ', $contacts);
        return $dealer->save();
    }

    public function update($request, $id)
    {
        $contacts = [];
        foreach ($request->contacts as $contact) {
            array_push($contacts, $contact['contact']);
        }
        $dealer = $this->findById($id);
        $dealer->name = $request->name;
        $dealer->address = $request->address;
        $dealer->regency_id = $request->city;
        $dealer->contacts = implode(', ', $contacts);
        return $dealer->save();
    }

    public function delete($id)
    {
        $dealer = $this->findById($id);
        return $dealer->delete();
    }
}