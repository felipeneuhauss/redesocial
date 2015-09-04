<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductController extends Controller {

    public function index() {

        $produtos = Product::all();

        return view('products.list')->with('produtos', $produtos);
    }

    public function jsonList() {

        $produtos = Product::all();

        return response()->json($produtos);
    }

    public function detail($id) {

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

    public function form($id) {

        $produto = Product::findOrNew($id);

        if (Request::isMethod('post')) {
            $produto->fill(Request::all());
            $produto->save();

            return redirect()->action('ProductController@index')->withInput(Request::except('_token'));
        }

        return view('products.form')->with('product', $produto);
    }

    public function remove($id) {

        if ($id) {
            $produto = Product::find($id);
            var_dump($produto);
            $produto->delete();
        }
        return redirect()->action('ProductController@index');
    }
} 