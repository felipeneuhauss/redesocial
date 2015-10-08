<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model implements ModelInterface
{

    protected $table = 'airports';

    protected $fillable = ['name', 'sigla'];

    public function queryPagination($perPage = 15, $search) {
        $result = $this->where('name', 'like', '%'.$search.'%')
            ->where('sigla', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }

}
