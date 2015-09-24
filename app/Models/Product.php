<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'products';

    protected $fillable = ['description'];

    protected $guarded = ['id'];

    public function categories() {
        return $this->belongsToMany('App\Category', 'product_categories');
    }

    public static function boot() {
        parent::boot();

        self::observe(new \App\Models\Observers\ProductObserver());
    }
}
