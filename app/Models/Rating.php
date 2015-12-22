<?php

namespace App\Models;

use App\Models\Contracts\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model implements ModelInterface
{
    //
    use SoftDeletes;

    protected $table = 'ratings';

    protected $fillable = ["id", "grade", "title", "description",
        "happened_at", "you_were", "service_quality_grade", "cost_benefit_grade", "contract_compliance_grade",
        "treatment_grade", "tips", "indicate", "return_contact", "phone", "term_read", "supplier_id", "product_id",
        "deleted_at", "category_id", "sub_category_id",
        "user_id","created_at","updated_at"];

    public static function boot() {
        parent::boot();

        self::observe(new \App\Models\Observers\RatingObserver());
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function queryPagination($perPage = 15, $search)
    {
        // TODO: Implement queryPagination() method.
    }

    /**
     * Calcula a nota total de uma empresa
     *
     * @param $supplier_id
     * @return mixed
     */
    public static function calculateSupplierGrade($supplierId) {
        $result = \DB::table('ratings')
            ->select( \DB::raw('SUM(grade) as grade'),\DB::raw('count(id) as quantity'))
            ->where('supplier_id','=', $supplierId)
            ->get();

        return $result;
    }

    /**
     * Calcula a nota total de um produto/servico
     *
     * @param $supplier_id
     * @return mixed
     */
    public static function calculateProductGrade($categoryId, $subCategoryId, $supplierId) {

        $result = \DB::table('ratings')
            ->select( \DB::raw('SUM(grade) as grade'),\DB::raw('count(id) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id','=', $supplierId)
            ->get();

        return $result;
    }

    /**
     * Calcula a nota total de uma empresa
     *
     * @param $supplier_id
     * @return mixed
     */
    public static function calculateSupplierStarsQuantityResume($supplierId) {

        $five = \DB::table('ratings')
            ->select( \DB::raw("'5' as stars"),\DB::raw('count(grade) as quantity'))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 5);

        $four = \DB::table('ratings')
            ->select( \DB::raw("'4' as stars"),\DB::raw('count(grade) as quantity'))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 4);

        $three = \DB::table('ratings')
            ->select( \DB::raw("'3' as stars"),\DB::raw('count(grade) as quantity'))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 3);

        $two = \DB::table('ratings')
            ->select( \DB::raw("'2' as stars"),\DB::raw('count(grade) as quantity'))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 2);

        $result = \DB::table('ratings')
            ->select( \DB::raw("'1' as stars"),\DB::raw('count(grade) as quantity'))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 1)->union($two)->union($three)->union($four)->union($five);

        return $result->get();
    }

    /**
     * Calcula a nota total de uma empresa
     *
     * @param $supplier_id
     * @return mixed
     */
    public static function calculateProductStarsQuantityResume($categoryId, $subCategoryId, $supplierId) {
        $five = \DB::table('ratings')
            ->select( \DB::raw("'5' as stars"),\DB::raw('count(grade) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id','=', $supplierId)->where('grade', '=', 5);

        $four = \DB::table('ratings')
            ->select( \DB::raw("'4' as stars"),\DB::raw('count(grade) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id', $supplierId)->where('grade', 4);

        $three = \DB::table('ratings')
            ->select( \DB::raw("'3' as stars"),\DB::raw('count(grade) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id', $supplierId)->where('grade', 3);

        $two = \DB::table('ratings')
            ->select( \DB::raw("'2' as stars"),\DB::raw('count(grade) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id', $supplierId)->where('grade',  2);

        $result = \DB::table('ratings')
            ->select( \DB::raw("'1' as stars"),\DB::raw('count(grade) as quantity'))
            ->where(($subCategoryId != null ? 'sub_category_id' : 'category_id'),
                ($subCategoryId != null ? $subCategoryId : $categoryId))
            ->where('supplier_id', $supplierId)->where('grade',  1)
            ->union($two)
            ->union($three)
            ->union($four)
            ->union($five);

        return $result->get();
    }
}
