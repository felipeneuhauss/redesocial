<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;

class SupplierGallery extends Model implements ModelInterface
{
    protected $table = 'supplier_galleries';

    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }
}
