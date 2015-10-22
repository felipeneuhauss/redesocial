<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 16/09/15
 * Time: 10:04
 */

namespace App\Models\Observers;

use Illuminate\Support\Facades\Auth;

class ProductObserver {
    public function saving($model)
    {
        $model->user_id = Auth::user()->id;
    }

    public function saved($model)
    {
    }

    public function updating($model)
    {
    }

    public function updated($model)
    {
    }

    public function deleting($model)
    {
    }

    public function deleted($model)
    {
    }
} 