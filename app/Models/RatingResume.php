<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RatingResume extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'ratings';

    protected $fillable = ["id", "grade", "service_quality_grade", "cost_benefit_grade", "contract_compliance_grade",
        "treatment_grade", "supplier_id", "deleted_at", "category_id", "sub_category_id",
        "user_id","created_at","updated_at"];

    public static function boot() {
        parent::boot();
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }

}
