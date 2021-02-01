<?php

namespace Modules\Dealer\Repository\Model\Entities;

use App\Models\Indonesia\Regency;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'name', 'address', 'regency_id', 'contacts',
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }
}