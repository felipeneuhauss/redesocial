<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 16/09/15
 * Time: 10:04
 */

namespace App\Models\Observers;


class ProductObserver {
    public function saving($model)
    {
        dump("Saving product");
    }

    public function saved($model)
    {
        dump("Product saved");
    }

    public function updating($model)
    {
        dump("Updating product");
    }

    public function updated($model)
    {
        dump("Product updated");
    }

    public function deleting($model)
    {
        dump("Deleting product");
    }

    public function deleted($model)
    {
        dump("Product deleted");
    }
} 