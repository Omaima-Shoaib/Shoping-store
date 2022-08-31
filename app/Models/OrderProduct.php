<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'product_id',
        'user_id',
        'category',
        'order_id',
    ];
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
