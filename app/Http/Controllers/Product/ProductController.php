<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Product;

use App\Http\Controllers\AppController;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;

class ProductController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth', ['only' => ['form', 'index']]);
        $this->repository = new Repository(new Product());
        $this->viewFolderName = 'products';
    }

    public function _validate()
    {
        return Validator::make(Request::all(), [
            'supplier_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'galleries'   => 'max:3'
        ],  [
            'supplier_id.required' => 'O campo :attribute é obrigatório.',
            'category_id.required' => 'O campo :attribute é obrigatório.',
            'description.required' => 'O campo :attribute é obrigatório.',
            'galleries.max'        => 'Selecione apenas 3 imagens.'
            ]);
    }

    protected function _initForm($vo = null)
    {
        $suppliers = array();

        if (Auth::check()) {
            $suppliers = \App\Models\Supplier::where('user_id', Auth::user()->id)->lists('fantasy_name','id');
        }

        $categories = \App\Models\Category::lists('name','id');

        $subCategories = array();

        if ($vo->id && $vo->sub_category_id) {
            $subCategories = \App\Models\Category::where('category_id', $vo->category_id)->lists('name','id');
        }

        $starsRatingResume = array();
        if ($vo->id) {
            $starsRatingResume = \App\Models\Rating::calculateProductStarsQuantityResume($vo->category_id, $vo->sub_category_id, $vo->supplier->id);
        }

        return array('vo' => $vo, 'suppliers' => $suppliers,
            'categories' => $categories, 'subCategories' => $subCategories, 'starsRatingResume' => $starsRatingResume);
    }

    protected function _preSave($vo) {
        $vo->sub_category_id = $vo->sub_category_id == "" || $vo->sub_category_id == "0" ? null : $vo->sub_category_id;
    }

    // https://laracasts.com/discuss/channels/general-discussion/jquery-file-upload-with-laravel
    protected function _postSave($vo) {
        /**
         * Salva a imagem da marca da empresa
         */
        $galleries  = Request::file('galleries');
        $categories  = Request::input('categories');

        /**
         * Salvar imagens da galeria
         */
        if (!is_null($galleries[0])) {
            // Remove as imagens para cadastra-las novamente
            \App\Models\ProductGallery::where('product_id', $vo->id)->delete();

            foreach ($galleries as $gallery) {
                $destinationPath = public_path() . '/uploads/products/'.md5($vo->id);
//            $filename = $brandImage->getClientOriginalName();
                $fileExtension = $gallery->getClientOriginalExtension();

                // Save the gallery object
                $fileName = uniqid().'.'.$fileExtension;
                $galleryRepo = new Repository(new Gallery());
                $galleryVo = $galleryRepo->findOrNew(null);
                $galleryVo->name = $fileName;
                $galleryVo->save();

                // Save the pivot table
                $vo->galleries()->save($galleryVo);

                // Save the upload file
                $uploadSuccess = $gallery->move($destinationPath, $fileName);

                if ($uploadSuccess) {
                    // resizing an uploaded file
                    Image::make($destinationPath .'/'. $fileName)->resize(100, 100)
                        ->save($destinationPath .'/'. "100x100_" . $fileName);
                }
            }
        }

        /**
         * Salva as categorias
         */
        if (count($categories)) {
            // Remove as categorias
            \App\Models\ProductCategory::where('product_id', $vo->id)->delete();
            foreach ($categories as $category) {
                // Pega o objeto da categoria
                $categoryVo = \App\Models\Category::find($category);

                $vo->categories()->save($categoryVo);
            }
        }
    }

}