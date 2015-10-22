<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ["id","name", "image"];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //
    public function products() {
        return $this->belongsToMany('Product','product_categories');
    }

    /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function queryPagination($perPage = 15, $search)
    {
        $result = $this->where('name', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }
}
