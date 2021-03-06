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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;
use Mail;

class SupplierController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth', ['only' => ['form', 'index']]);
        $this->repository = new Repository(new Supplier());
        $this->viewFolderName = 'suppliers';
    }

    public function allSuppliers() {

        $search = '';
        if (Request::input('search') != "" ) {
            $search = Request::input('search');
            $result = $this->repository->paginate(10, $search);
        } else {
            $result = $this->repository->paginate(10);
        }

        $modelSupplier = new \App\Models\Supplier();

        $topSuppliers = $modelSupplier->getTopSuppliers(5, 5);

        return view($this->viewFolderName.'.all-suppliers')
            ->with('data', $result)->with('search', $search)->with('topSuppliers', $topSuppliers);
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
            'representative_name'   => 'required|max:250',
            'representative_cpf'    => 'required|max:14',
            'email'                 => 'required|email|max:255|unique:users',
            'link'                  => 'max:150|unique:suppliers',
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
            'link.required'                  => 'O campo Link é obrigatório.',
            'link.unique'                    => 'O valor informado no campo "Link" já está em uso por outro fornecedor.',
            'link.max'                       => 'O valor informado no campo "Link" deve ter no máximo 150 caracteres.',
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
        $countries = \App\Models\Country::lists('name','id');

        $modelSupplier = new \App\Models\Supplier();

        $topSuppliers = $modelSupplier->getTopSuppliers(5, 5);

        $starsRatingResume = array();
        if ($vo->id) {
            $starsRatingResume = \App\Models\Rating::calculateSupplierStarsQuantityResume($vo->id);
        }

        return array('vo' => $vo, 'countries' => $countries,
            'topSuppliers' => $topSuppliers, 'starsRatingResume' => $starsRatingResume);
    }

    
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

    public function contact() {
        if (Request::isMethod('post'))
        {
            try {
                $data = Request::all();

                $supplier = \App\Models\Supplier::find($data['id']);

                Mail::send('index.contact-mail', ['data' => $data], function ($m) use ($data, $supplier) {
                    $m->to($supplier->email, $supplier->fantasy_name)
                        ->subject('UPEVENTO - Contato pelo site ')
                        ->from($data['email'], $data['name'])
                        ->replyTo($data['email'], $data['name']);
                });

                return "E-mail enviado com sucesso! Em breve retornaremos.";
            } catch (Exception $e) {
                return "Tivemos problemas para enviar seu e-mail.". $e->getMessage();
            }
        }
    }

    public function autocomplete($term) {
        return DB::table('suppliers')
            ->select(DB::raw('id, fantasy_name as name, grade, brand_image, description, rating_quantity'))
            ->where('fantasy_name', 'like', '%'. $term . '%')
            ->whereNull('deleted_at')
            ->get();
    }

}