<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function images()
    {
        return $this->hasMany('App\Models\Image','product_id','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment','product_id','id');
    }
}
