<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shipping extends Model
{
    use HasFactory ,Notifiable;
    public $timestamps = true;

    protected $fillable = [
        'shippingid',
        'shippingcountry',
        'shippingstate',
        'shippingcity',
        'Shippingdelivery_time',
        'Shippingdelivery_charge',
    ];

}
