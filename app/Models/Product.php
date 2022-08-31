<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'price',
        'description',
        'image',
    ];
    public function favorites(){
        return $this->hasMany('App\Models\Favorites','product_id');
    }
}
