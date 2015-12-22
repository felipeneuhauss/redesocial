<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 16/09/15
 * Time: 10:04
 */

namespace App\Models\Observers;


use Illuminate\Support\Facades\Auth;

class RatingObserver {

    public function saving($model)
    {
        $model->user_id = Auth::user()->id;
    }

    public function saved($model)
    {

    }

    public function updating($model)
    {
//        dump("Updating product");
    }

    public function updated($model)
    {
//        dump("Supplier updated");
    }

    public function deleting($model)
    {
//        dump("Deleting product");
    }

    public function deleted($model)
    {
//        dump("Supplier deleted");
    }
} 