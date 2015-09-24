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

        $result = $this->repository->getAll();
        return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__))
            ->with('data', $result);
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
                return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__))
                    ->withErrors($validator)
                    ->with('vo', $vo);
            }

            $vo->save();

            return redirect()->action('Product\ProductController@index')->withInput(Request::except('_token'));
        }

        return view($this->viewFolderName.'.'.$this->_formatFileName(__FUNCTION__))->with('vo', $vo);
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
        }
        return redirect()->action('Product\ProductController@index');
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
