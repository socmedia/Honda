<?php

namespace Modules\Lead\Repository\Model;

use Modules\Lead\Repository\LeadRepositoryInterface;
use Modules\Lead\Repository\Model\Entities\Lead;

class LeadModel implements LeadRepositoryInterface
{
    public function getAll($request)
    {
        //
    }

    public function findById($id)
    {
        return Lead::findOrFail($id);
    }

    public function update($request, $id)
    {
        $lead = $this->findById($id);
        $lead->status = $request->status;
        $lead->is_readed = !empty($request->is_readed) ? 0 : 1;
        return $lead->save();
    }

    public function delete($id)
    {
        $lead = $this->findById($id);
        return $lead->delete();
    }
}