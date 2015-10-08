<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model implements ModelInterface
{

    protected $table = 'galleries';

    /**
     * The suppliers that belong to a gallery
     */
    public function suppliers() {
        $this->belongsToMany('App\Models\Supplier', 'supplier_galleries');
    }

    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }
}
