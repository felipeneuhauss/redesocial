<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 15/09/15
 * Time: 10:24
 */
namespace App\Repositories\Contracts;

interface RepositoryInterface {
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function where($field, $condition, $value);
    public function paginate($perPage = 15, $search);
    public function getFillable();
}