<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model implements ModelInterface
{
    //
    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }
}
