<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Product;

use App\Http\Controllers\AppController;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Support\Facades\Validator;
use Request;

class ProductController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->repository = new ProductRepository(new Product());
        $this->viewFolderName = 'products';
    }

    public function _validate()
    {
        return Validator::make(Request::all(), [
            'nome' => 'required|max:100|min:3',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ],  [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'descricao.required' => 'O campo :attribute é obrigatório.',
            'valor.required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo :attribute deve ter no mínimo 3 caracteres.',
            'valor.numeric' => 'O campo :attribute deve ser um número.',
            ]);
    }

}