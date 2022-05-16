<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $primaryKey = 'cart_id';

    protected $fillable = ['product_id', 'consultant_id', 'qty'];

    public function consultants()
    {
        return $this->hasMany(Consultants::class, "consultant_id");
    }

    public function products()
    {
        return $this->hasMany(Products::class, "product_id");
    }

}
