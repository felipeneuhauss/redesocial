<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model implements ModelInterface
{

    use SoftDeletes;

    protected $table = 'suppliers';

    protected $fillable = ["id", "fantasy_name", "email", "country", "social_name", "cnpj",
        "representative_name","representative_cpf","representative_phone","description", "zip_code","address","number",
        "city","state","district", "complement","term_read","link","phone_one","phone_two","site","facebook","twitter",
        "instagram","youtube","brand_image", "user_id","created_at","updated_at"];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('User');
    }

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function galleries() {
        return $this->belongsToMany('App\Models\Gallery', 'supplier_galleries');
    }

    public function categories() {
        $categories = array();
        foreach ($this->products as $product) {
            foreach ($product->categories as $category) {
                $categories[] = $category->name;
            }
        }
        return array_unique($categories);
    }

    public static function boot() {
        parent::boot();

        self::observe(new \App\Models\Observers\SupplierObserver());
    }


    public function queryPagination($perPage = 15, $search) {
        $result = $this->where('fantasy_name', 'like', '%'.$search.'%')
            ->where('social_name', 'like', '%'.$search.'%')
            ->orWhere('cnpj', 'like', '%'.$search.'%')
            ->paginate($perPage);

        return $result;
    }
}
