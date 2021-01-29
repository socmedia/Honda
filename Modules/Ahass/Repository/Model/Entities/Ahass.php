<?php

namespace Modules\Ahass\Repository\Model\Entities;

use App\Models\Indonesia\Regency;
use Illuminate\Database\Eloquent\Model;

class Ahass extends Model
{
    public $table = 'ahass';

    protected $fillable = [
        'name', 'address', 'regency_id', 'phone_1', 'phone_2',
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }
}