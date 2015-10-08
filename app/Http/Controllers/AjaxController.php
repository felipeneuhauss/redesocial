<?php

namespace App\Http\Controllers;
use Request;

/**
 * Class AppController
 * @package App\Http\Controllers
 *
 * Especializacao da classe Controller para reutilizacao de funcoes
 */
abstract class AjaxController extends Controller
{
    /**
     * @var \App\Repositories\AbstractRepository.php
     */
    protected $repository;
    protected $viewFolderName = '';

    public function __construct() {

    }

    public function index() {

    }

    public function getAll() {

        if (Request::input('search') != "") {
            $result = $this->repository->where("value", 'LIKE', '%'. Request::input('search'). '%')->paginate(15);
        } else {
            $result = $this->repository->paginate(20);
        }
        return $result;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function form($id = null) {
        $vo = $this->repository->findOrNew($id);

        if (Request::isMethod('post'))
        {
            $validator = $this->_validate();

            $vo->fill(Request::all());
            if ($validator->fails()) {
                return array('success' => false, 'type' => 'error', 'messages' => $validator);
            }

            $vo->save();

            return $vo;
        }

        return $vo;
    }

    public function detail($id) {

        if ($id) {
            $vo = $this->repository->find($id);
            if (empty($vo)) {
                return array('success' => false, 'type' => 'error', 'message' => 'Registro não encontrado');
            }

            return $vo;
        } else {
            return array('success' => false, 'type' => 'warning', 'message' => 'Registro não encontrado');
        }
    }

    public function remove($id) {

        if ($id) {
            $vo = $this->repository->find($id);
            $vo->delete();
            return array('success' => true, 'type' => 'success', 'message' => 'Registro removido com sucesso');
        }
        return array('success' => false, 'type' => 'error', 'message' => 'Registro não removido. Informe o ID');
    }

    protected function _formatFileName($functionName) {
        return $functionName;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function _validate()
    {
        return Validator::make(Request::all(), [], []);
    }

}
