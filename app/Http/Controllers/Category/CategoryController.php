<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Category;

use App\Http\Controllers\AppController;
use App\Models\Category;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;

class CategoryController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
        $this->repository = new Repository(new Category());
        $this->viewFolderName = 'categories';
    }

    public function _validate()
    {
        $validator = Validator::make(Request::all(), [
            'name' => 'required|max:100|min:3',
        ],  [
            'name.required' => 'O campo :attribute é obrigatório.'
            ]);

        return $validator;
    }

    protected function _postSave($vo) {
        /**
         * Salva a imagem da marca da empresa
         */
        $image = Request::file('image');

        if($image) {

            $destinationPath = public_path() . '/uploads/categories/';
//            $filename = $brandImage->getClientOriginalName();
            $fileExtension = $image->getClientOriginalExtension();

            $fileName = md5($vo->id).'.'.$fileExtension;
            $vo->image = $fileName;
            $vo->save();

            $uploadSuccess = Request::file('image')->move($destinationPath, $fileName);

            if ($uploadSuccess) {
                // resizing an uploaded file
                Image::make($destinationPath . $fileName)->resize(100, 100)
                    ->save($destinationPath . "100x100_" . $fileName);
            }
        }
    }

    protected function _initForm($vo = null)
    {
        $categories = \App\Models\Category::lists('name','id');

        return array('vo' => $vo, 'categories' => $categories);
    }

}