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

    /**
     * @var \App\Models\Contracts\ModelInterface
     */
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

    public function where($field, $condition, $value) {
        $this->model->where($field, $condition, $value);
        return $this->model;
    }

    public function paginate($perPage = 15, $search = null)
    {
        return $this->model->queryPagination($perPage, $search);
    }

    public function getFillable() {
        return $this->model->getFillable();
    }

    public function lists($name = 'name', $id = 'id'){
        // $countries = \App\Models\Country::lists('name','id');
        return $this->model->lists($name, $id);

    }
}
