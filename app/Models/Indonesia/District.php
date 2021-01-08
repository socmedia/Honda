<?php

namespace App\Models\Indonesia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'regency_id'];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }
}