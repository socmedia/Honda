<?php

namespace Modules\Lead\Repository\Model\Entities;

use App\Models\Indonesia\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Repository\Model\Entities\Product;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'regency_id', 'product_id', 'note', 'status', 'is_readed',
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}