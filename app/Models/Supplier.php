<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Supplier extends Model implements ModelInterface
{
    protected $table = 'suppliers';

    protected $fillable = ["id","fantasy_name", "email","country", "social_name","cnpj",
        "representative_name","representative_cpf","representative_phone","zip_code","address","number",
        "city","state","district", "complement","term_read","link","phone_one","phone_two","site","facebook","twitter",
        "instagram","youtube","brand_image", "user_id","created_at","updated_at"];

    public function user() {
        return $this->belongsTo('User');
    }

    public function galleries() {
        return $this->belongsToMany('App\Models\Gallery', 'supplier_galleries');
    }

    public static function boot() {
        parent::boot();

        self::observe(new \App\Models\Observers\SupplierObserver());
    }

    public function queryPagination($perPage = 15, $search) {
        $result = $this->where('fantasy_name', 'like', '%'.$search.'%')
            ->where('social_name', 'like', '%'.$search.'%')
            ->orWhere('cnpj', 'like', '%'.$search.'%')
            ->orWhere('user_id', '=', Auth::user()->id)
            ->paginate($perPage);

        return $result;
    }
}
