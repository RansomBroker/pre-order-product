<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $primaryKey = 'item_id';

    protected $fillable = ['order_id', 'product_id', 'created_at'];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
