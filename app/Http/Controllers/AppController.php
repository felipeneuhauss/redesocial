<?php

namespace App\Http\Controllers;
use Request;

/**
 * Class AppController
 * @package App\Http\Controllers
 *
 * Especializacao da classe Controller para reutilizacao de funcoes
 */
abstract class AppController extends Controller
{
    /**
     * @var \App\Repositories\AbstractRepository.php
     */
    protected $repository;
    protected $viewFolderName = '';

    public function __construct() {
    }

    public function index() {

        $search = '';
        if (Request::input('search') != "" ) {
            $search = Request::input('search');
            $result = $this->repository->paginate(15, $search);
        } else {
            $result = $this->repository->paginate(15);
        }

        return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__))
            ->with('data', $result)->with('search', $search);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function form($id = null) {

        if (is_null($id)) {
            $id = Request::input('id') == null || Request::input('id') == '' ? null : Request::input('id');
        }

        $vo = $this->repository->findOrNew($id);

        if (Request::isMethod('post'))
        {
            $validator = $this->_validate();

            $vo->fill(Request::all());

            if ($validator->fails()) {
                return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__),
                    $this->_initForm($vo))
                    ->withErrors($validator);
            }

            $vo->save();
            $this->_postSave($vo);
        }

        return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__), $this->_initForm($vo));
    }

    public function detail($id) {

        if ($id) {
            $vo = $this->repository->find($id);
            if (empty($vo)) {
                return "Objeto não encontrado";
            }

            return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__))->with('vo', $vo);
        } else {
            return "Objeto não existe";
        }
    }

    public function remove($id) {

        if ($id) {
            $vo = $this->repository->find($id);
            $vo->delete();
            return array('success' => true, 'message' => 'Registro removido com sucesso');
        }
        return array('success' => false, 'message' => 'Registro removido com sucesso');
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

    /**
     *
     * @param mix $vo
     * @return array
     */
    protected function _initForm($vo = null) {
        return array('vo' => $vo);
    }

    protected function _postSave($vo) {
        return $vo;
    }

}
