<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\AppController;
use App\Models\Gallery;
use App\Models\Supplier;
use App\Models\SupplierGallery;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;

class SupplierController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->repository = new Repository(new Supplier());
        $this->viewFolderName = 'suppliers';
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
            'fantasy_name'          => 'required|max:255',
            'social_name'           => 'required|max:255',
            'cnpj'                  => 'required',
            'representative_name'   => 'required|max:20',
            'representative_cpf'    => 'required|max:14',
            'email'                 => 'required|email|max:255|unique:users',
            'zip_code'              => 'required|min:9',
            'phone_one'             => 'min:8',
            'representative_phone'  => 'required|min:8',
            'address'               => 'required|max:255',
            'city'                  => 'required|max:100',
            'country'               => 'required',
            'number'                => 'required',
            'district'              => 'required|max:100',
            'state'                 => 'required|max:100',
            'term_read'             => 'required',
            'brand_image'           => 'image',
//            'galleries'             => 'image'
        ], [
            'fantasy_name.required'         => 'O campo Nome fantasia é obrigatório.',
            'social_name.required'          => 'O campo Razão social é obrigatório.',
            'cnpj.required'                 => 'O campo CNPJ é obrigatório.',
            'representative_name.required'  => 'O campo Nome do representante legal é obrigatório.',
            'representative_cpf'             => 'O campo Nome do representante legal é obrigatório.',
            'email.email'                    => 'O campo E-mail deve ter um endereço válido.',
            'email.required'                 => 'O campo E-mail é obrigatório.',
            'email.max'                      => 'O campo E-mail deve ter no máximo 200 caracteres.',
            'zip_code.min'                   => 'O campo CEP deve ter no mínimo 9 caracteres.',
            'zip_code.required'              => 'O campo CEP é obrigatório.',
            'representative_phone.required'  => 'O campo Telefone do representante legal é obrigatório.',
            'representative_phone.min'       => 'O campo Telefone do representante legal deve ter no mínimo 8 digitos.',
            'phone.min'                      => 'O campo Telefone deve ter no mínimo 8 digitos.',
            'phone_one.min'                  => 'O campo Telefone principal da empresa deve ter no mínimo 8 digitos.',
            'address.max'                    => 'O campo Endereço deve ter no máximo 255 caracteres.',
            'address.required'               => 'O campo Endereço é obrigatório.',
            'city.required'                  => 'O campo Cidade é obrigatório.',
            'city.max'                       => 'O campo Cidade deve ter no máximo 100 caracteres.',
            'country.required'               => 'O campo País é obrigatório.',
            'district.required'              => 'O campo Bairro é obrigatório.',
            'state.required'                 => 'O campo Estado é obrigatório.',
            'number.required'                => 'O campo Número é obrigatório.',
            'state.max'                      => 'O campo Estado deve ter no máximo 100 caracteres.',
            'term_read.required'             => 'Você deve concordar com os termos de uso.',
            'brand_image.image'              => 'O arquivo para a marca da empresa deve ser uma imagem.',
//            'galleries.image'                => 'Os arquivos para galeria devem ser apenas images png, jpg ou jpeg.',
        ]);
    }

    protected function _initForm($vo = null)
    {
        if (Auth::user()) {
            $vo = Supplier::where('user_id', Auth::user()->id)->first();
        }

        $countries = \App\Models\Country::lists('name','id');

        return array('vo' => $vo, 'countries' => $countries);
    }

    // https://laracasts.com/discuss/channels/general-discussion/jquery-file-upload-with-laravel
    protected function _postSave($vo) {
        /**
         * Salva a imagem da marca da empresa
         */
        $brandImage = Request::file('brand_image');
        $galleries  = Request::file('galleries');

        if($brandImage) {

            $destinationPath = public_path() . '/uploads/brands/';
//            $filename = $brandImage->getClientOriginalName();
            $fileExtension = $brandImage->getClientOriginalExtension();

            $fileName = md5($vo->id).'.'.$fileExtension;
            $vo->brand_image = $fileName;
            $vo->save();

            $uploadSuccess = Request::file('brand_image')->move($destinationPath, $fileName);

            if ($uploadSuccess) {
                // resizing an uploaded file
                Image::make($destinationPath . $fileName)->resize(100, 100)
                    ->save($destinationPath . "100x100_" . $fileName);
            }
        }

        /**
         * Salvar imagens da galeria
         */
        if (!is_null($galleries[0])) {
            foreach ($galleries as $gallery) {
                $destinationPath = public_path() . '/uploads/galleries/'.md5($vo->id);
//            $filename = $brandImage->getClientOriginalName();
                $fileExtension = $gallery->getClientOriginalExtension();

                // Save the gallery object
                $fileName = uniqid().'.'.$fileExtension;
                $galleryRepo = new Repository(new Gallery());
                $galleryVo = $galleryRepo->findOrNew(null);
                $galleryVo->name = $fileName;
                $galleryVo->save();

                // Save the pivot table
                $supplierGalleryRepo = new Repository(new SupplierGallery());
                $supplierGalleryVo = $supplierGalleryRepo->findOrNew(null);
                $supplierGalleryVo->supplier_id = $vo->id;
                $supplierGalleryVo->gallery_id = $galleryVo->id;
                $supplierGalleryVo->save();

                // Save the upload file
                $uploadSuccess = $gallery->move($destinationPath, $fileName);

                if ($uploadSuccess) {
                    // resizing an uploaded file
                    Image::make($destinationPath .'/'. $fileName)->resize(100, 100)
                        ->save($destinationPath .'/'. "100x100_" . $fileName);
                }
            }
        }
    }

}