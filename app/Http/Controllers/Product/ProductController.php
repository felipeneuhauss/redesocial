<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Product;

use Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use RedBeanPHP\R as R;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth', array('only' => ['form', 'remove']));
    }

    public function redbean() {

        $category = R::dispense('category');
        $category->name = 'Example 2';
        R::store($category);

        return view('welcome');

    }
    public function index() {

        $produtos = Product::all();

        return view('products.list')->with('produtos', $produtos);
    }

    public function jsonList() {

        $produtos = Product::all();

        return response()->json($produtos);
    }

    public function detail(ProductRequest $request, $id) {

        if ($id) {
            $produto = Product::find($id);
            if (empty($produto)) {
                return "Produto não encontrado";
            }

            return view('products.detail')->with('p', $produto);
        } else {
            return "Produto não existe";
        }
    }

    public function form(ProductRequest $request) {

        $produto = Product::findOrNew($request->get('id', null));

        if (Request::isMethod('post')) {
            $produto->fill($request->all());
            $produto->save();

            return redirect()->action('Product\ProductController@index')->withInput(Request::except('_token'));
        }

        return view('products.form')->with('product', $produto);
    }

    public function remove(ProductRequest $request, $id) {

        if ($id) {
            $produto = Product::find($id);
            $produto->delete();
        }
        return redirect()->action('Product\ProductController@index');
    }
} 