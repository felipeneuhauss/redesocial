<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model implements ModelInterface
{
    public function galleries() {
        return $this->belongsToMany('App\Gallery', 'product_galleries');
    }

    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }
}
