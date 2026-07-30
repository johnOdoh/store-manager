<?php

namespace App\Models;

use App\Enum\Store\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => Status::class
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}