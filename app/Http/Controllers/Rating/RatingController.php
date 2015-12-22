<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\AppController;
use App\Models\Rating;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Validator;
use Request;

class RatingController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth', ['only' => ['form', 'index']]);
        $this->repository = new Repository(new Rating());
        $this->viewFolderName = 'ratings';
    }

    public function allSuppliers() {

        $search = '';
        if (Request::input('search') != "" ) {
            $search = Request::input('search');
            $result = $this->repository->paginate(10, $search);
        } else {
            $result = $this->repository->paginate(10);
        }

        return view($this->viewFolderName.'.all-suppliers')
            ->with('data', $result)->with('search', $search);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function _validate()
    {
        return Validator::make(Request::all(), [
            'grade'                 => 'required',
            'title'                 => 'required|max:151',
            'description'           => 'required',
            'category_id'            => 'required',
            'term_read'             => 'required'
        ], [
            'grade.required'        => 'O campo Nota Geral é obrigatório.',
            'title.required'        => 'O campo Título é obrigatório.',
            'title.max'             => 'O campo Título deve ter no máximo 200 caracteres.',
            'description.required'  => 'O campo Descrição é obrigatório.',
            'category_id.required'   => 'O campo Categoria do serviço é obrigatório.',
            'term_read.required'    => 'Você deve concordar com os termos da avaliação.',
        ]);
    }

    /**
     * @return $this|void
     */
    /**
     * @param Request $request
     * @return $this
     */
    public function form($id = null, $supplier_id = null) {
        if (is_null($id)) {
            $id = Request::input('id') == null || Request::input('id') == '' ? null : Request::input('id');
        }

        $vo = $this->repository->findOrNew($id);

        $supplier_id = $supplier_id ? $supplier_id : Request::input('supplier_id');

        $supplier = \App\Models\Supplier::find($supplier_id);

        $categories = \App\Models\Category::lists('name','id');

        $subCategories = array();

        if ($vo->id && $vo->sub_category_id) {
            $subCategories = \App\Models\Category::where('category_id', $vo->category_id)->lists('name','id');
        }

        $validator = array();

        if (Request::isMethod('post'))
        {
            $validator = $this->_validate();

            $vo->fill(Request::all());

            if (!$validator->fails()) {
                $this->_preSave($vo);
                $vo->save();
                $this->_postSave($vo);

                \Session::flash('messages', array('Avaliação enviada com sucesso!'));
                return redirect('/suppliers/detail/'.$supplier_id);
            }
        }

        return view('ratings.form',
            array('vo' => $vo, 'supplier' => $supplier, 'categories' => $categories, 'subCategories' => $subCategories))
            ->withErrors($validator);
    }

    protected function _preSave($vo) {
        $vo->category_id = $vo->category_id ? $vo->category_id : null;
        $vo->sub_category_id = $vo->sub_category_id ? $vo->sub_category_id : null;
        return $vo;
    }

    protected function _postSave($vo) {
        $supplier = \App\Models\Supplier::find($vo->supplier_id);

        // Atualiza a nota do fornecedor e a quantidade de avaliações
        $result = \App\Models\Rating::calculateSupplierGrade($supplier->id);
        $supplier->grade = $result[0]->grade / $result[0]->quantity;
        $supplier->rating_quantity = $result[0]->quantity;

        // Salva a nova nota do fornecedor
        $supplier->save();


        // Atualiza a avaliacao dos produtos
        $products = \App\Models\Product::where(($vo->sub_category_id != null ? 'sub_category_id' : 'category_id') ,
            ($vo->sub_category_id != null ? $vo->sub_category_id : $vo->category_id))
            ->where('supplier_id', $vo->supplier_id)->get();

        if (count($products)) {
            foreach ($products as &$product) {
                $result = \App\Models\Rating::calculateProductGrade($vo->category_id, $vo->sub_category_id, $supplier->id);

                $product->grade = $result[0]->grade / $result[0]->quantity;
                $product->rating_quantity = $result[0]->quantity;

                // Salva a nova nota do produto
                $product->save();
            }
        }
    }

}