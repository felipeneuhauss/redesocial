<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSupplier extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'event_suppliers';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'event_id', 'supplier_id', 'created_at', 'updated_at'];


    public function event() {
        return $this->belongsTo('App\Models\Event');
    }

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function queryPagination($perPage = 15, $search)
    {
        $result = $this->where('name', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }
}