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

    protected $fillable = ['description', 'category_id', 'supplier_id'];

    protected $guarded = ['id'];

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function categories() {
        return $this->belongsToMany('\App\Models\Category', 'product_categories');
    }

    public function galleries() {
        return $this->belongsToMany('\App\Models\Gallery', 'product_galleries');
    }

    public static function boot() {
        parent::boot();

        self::observe(new \App\Models\Observers\ProductObserver());
    }

    public function queryPagination($perPage = 15, $search)
    {
        $result = $this->where('description', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }
}
