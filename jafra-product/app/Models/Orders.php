<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = ['order_facture', 'consultant_id', 'total', 'created_at'];

    public $timestamps = true;
}
