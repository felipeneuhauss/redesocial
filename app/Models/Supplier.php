<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function user() {
        return $this->belongsTo('User');
    }
}
