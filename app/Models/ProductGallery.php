<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    public function galleries() {
        return $this->belongsToMany('App\Gallery', 'product_galleries');
    }
}
