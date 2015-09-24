<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierGallery extends Model
{
    public function galleries() {
        return $this->belongsToMany('App\Gallery', 'supplier_galleries');
    }
}
