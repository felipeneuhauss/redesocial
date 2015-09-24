<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 15/09/15
 * Time: 11:34
 */

namespace App\Repositories\Eloquent;


use App\Repositories\AbstractRepository;

class ProductRepository extends AbstractRepository {

    /**
     * @param Produto $model
    */
    public function __construct(\App\Models\Contracts\ModelInterface $model) {
        /** @var Produto $model */
        $this->model = $model;
    }
} 