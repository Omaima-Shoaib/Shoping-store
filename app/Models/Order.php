<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'category',
        'total',
        'quantity',
        'address',

    ];
    public function orderproducts(){
        return $this->hasMany('App\Models\OrderProduct');
    }

}
