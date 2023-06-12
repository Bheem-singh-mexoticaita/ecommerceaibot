<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartSession extends Model
{
    use HasFactory;
        public $timestamps = true;

    protected $fillable = [
        'user_id',
        'session',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'product_total_price',
        'product_image',
        'cart',
  ];    

}
