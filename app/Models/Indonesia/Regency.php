<?php

namespace App\Models\Indonesia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district()
    {
        return $this->hasMany(District::class, 'regency_id', 'id');
    }
}