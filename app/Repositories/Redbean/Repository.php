<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 15/09/15
 * Time: 11:34
 */

namespace App\Repositories\Redbean;

use App\Repositories\Contracts\RepositoryInterface;
use RedBeanPHP;

class Repository implements RepositoryInterface {

    /**
     * @param Produto $model
    */
    public function __construct(\App\Models\Contracts\ModelInterface $model) {
        /** @var Produto $model */
        \R::setup( 'mysql:host='.env('DB_HOST').';dbname='.env('DB_DATABASE').'',
            env('DB_USERNAME'), env('DB_PASSWORD'));

        $this->model = $model;
    }

    public function getAll()
    {
        $result = \R::findAll($this->model->getTable(), 'deleted_at is null');

        return \R::exportAll( $result, true );
    }

    public function find($id = null)
    {
        // TODO: Implement find() method.
        if (is_null($id)) {
            return \R::dispense($this->model->getTable());
        } else {
            return \R::load($this->model->getTable(), $id);
        }

    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function where($field, $condition, $value)
    {
        // TODO: Implement where() method.
    }

    public function paginate($perPage = 15, $search)
    {
        // TODO: Implement paginate() method.
    }

    public function getFillable()
    {
        // TODO: Implement getFillable() method.
    }
}