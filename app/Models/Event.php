<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'events';

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'name', 'init_at', 'end_at', 'init_hour', 'end_hour', 'password', 'max_attendees', 'quantity_person_waiting', 'description', 'country', 'zip_code', 'address', 'district', 'city', 'state', 'number', 'complement', 'image', 'link', 'phone', 'email', 'site', 'facebook', 'created_at', 'updated_at'];

    public function suppliers() {
        return $this->belongsToMany('App\Models\Supplier', 'event_suppliers');
    }

    public function queryPagination($perPage = 15, $search)
    {
        $result = $this->where('name', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }
}