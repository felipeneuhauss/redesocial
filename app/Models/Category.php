<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function products() {
        return $this->belongsToMany('Product','product_categories');
    }
}
