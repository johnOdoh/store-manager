<?php

namespace App\Models;

use App\Enum\Product\BulkType;
use App\Enum\Product\SaleType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        'bulk_type' => BulkType::class,
        'sale_type' => SaleType::class
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
