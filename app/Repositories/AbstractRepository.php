<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 15/09/15
 * Time: 11:01
 */

namespace App\Repositories;


use App\Repositories\Contracts\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{

    protected $model;

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrNew($id)
    {
        return $this->model->findOrNew($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }
}
