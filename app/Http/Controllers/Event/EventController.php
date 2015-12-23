<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Event;

use App\Http\Controllers\AppController;
use App\Models\Event;
use App\Models\EventSupplier;
use App\Models\Supplier;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Request;

class EventController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->middleware('auth', ['only' => ['form', 'index']]);
        $this->repository = new Repository(new Event());
        $this->viewFolderName = 'Events';
    }

    public function _validate()
    {
        return Validator::make(Request::all(), ['name' => 'required|max:255',
                'init_at' => 'required',
                'end_at' => 'required',
                'init_hour' => 'required|max:5',
                'end_hour' => 'required|max:5',
                'password' => 'required|max:255',
                'max_attendees' => 'required|max:255',
                'quantity_person_waiting' => 'required|max:255',
                'description' => 'required',
                'country' => 'required|max:150',
                'zip_code' => 'required|max:10',
                'address' => 'required|max:255',
                'district' => 'required|max:150',
                'city' => 'required|max:100',
                'state' => 'required|max:100',
                'number' => 'required|max:10',
                'complement' => 'max:255',
                'image' => 'required',
                'link' => 'required|max:255|unique:events',
                'phone' => 'required|max:15',
                'email' => 'required|max:200|email',
                'site' => 'max:255',
                'facebook' => 'max:255',
                'term_read' => 'required'
            ],
            [
                'name.required' => 'O campo Nome é obrigatório',
                'name.max' => 'O campo Nome deve ter no máximo 255 caracteres',
                'init_at.required' => 'O campo Data de início é obrigatório',
                'end_at.required' => 'O campo Data fim é obrigatório',
                'init_hour.required' => 'O campo Hora de início é obrigatório',
                'init_hour.max' => 'O campo Hora de início deve ter no máximo 5',
                'end_hour.required' => 'O campo Hora fim é obrigatório',
                'end_hour.max' => 'O campo Hora fim deve ter no máximo 5 caracteres',
                'password.required' => 'O campo Password é obrigatório',
                'password.max' => 'O campo Password deve ter no máximo 255 caracteres',
                'max_attendees.required' => 'O campo Número máximo de participantes no evento é obrigatório',
                'max_attendees.max' => 'O campo Número máximo de participantes no evento deve ter no máximo 255 caracteres',
                'quantity_person_waiting.required' => 'O campo Número de pessoas na fila de espera é obrigatório',
                'quantity_person_waiting.max' => 'O campo Número de pessoas na fila de espera deve ter no máximo 255 caracteres',
                'description.required' => 'O campo Descrição é obrigatório',
                'country.required' => 'O campo País é obrigatório',
                'country.max' => 'O campo País deve ter no máximo 150 caracteres',
                'zip_code.required' => 'O campo CEP é obrigatório',
                'zip_code.max' => 'O campo CEP deve ter no máximo 10 caracteres',
                'address.required' => 'O campo Endereço é obrigatório',
                'address.max' => 'O campo Endereço deve ter no máximo 255 caracteres',
                'district.required' => 'O campo Bairro é obrigatório',
                'district.max' => 'O campo Bairro deve ter no máximo 150 caracteres',
                'city.required' => 'O campo Cidade é obrigatório',
                'city.max' => 'O campo Cidade deve ter no máximo 100 caracteres',
                'state.required' => 'O campo Estado é obrigatório',
                'state.max' => 'O campo Estado deve ter no máximo 100 caracteres',
                'number.required' => 'O campo Número é obrigatório',
                'number.max' => 'O campo Número deve ter no máximo 10 caracteres',
                'complement.max' => 'O campo Complemento deve ter no máximo 255 caracteres',
                'image.required' => 'O campo Imagem é obrigatório',
                'link.required' => 'O campo Link é obrigatório',
                'link.max' => 'O campo Link deve ter no máximo 255 caracteres',
                'link.unique' => 'O valor informado no campo "Link" já está em uso por outro evento.',
                'phone.required' => 'O campo Telefone é obrigatório',
                'phone.max' => 'O campo Telefone deve ter no máximo 15 caracteres',
                'email.required' => 'O campo Email é obrigatório',
                'email.max' => 'O campo E-mail deve ter no máximo 200 caracteres',
                'email.date' => 'O campo E-mail deve ser um e-mail válido',
                'site.max' => 'O campo Site deve ter no máximo 255 caracteres',
                'facebook.max' => 'O campo Facebook deve ter no máximo 255 caracteres',
                'term_read.required' => 'Você deve ler e concordar com os termos de uso',
            ]);

    }

    protected function _initForm($vo = null)
    {
        /**
         * Obtem os suppliers que vieram da requisicao para mostrar novamente
         * no segundo passo do cadastro do evento
         */
        $suppliers = array();
        $suppliers = Request::input('suppliers');

        if (count($suppliers)) {
            $suppliers = \App\Models\Supplier::whereIn('id', $suppliers)->get();
        }

        $countries = \App\Models\Country::lists('name','id');
        return array('vo' => $vo, 'countries' => $countries, 'suppliers' => $vo->id ? $vo->suppliers : $suppliers);
    }

    protected function _preSave($vo) {
        $vo->init_at = convert_date_to_db($vo->init_at);
        $vo->end_at = convert_date_to_db($vo->end_at);
    }

    // https://laracasts.com/discuss/channels/general-discussion/jquery-file-upload-with-laravel
    protected function _postSave($vo) {
        /**
         * Salva a imagem da marca da empresa
         */
        $image  = Request::file('image');
        $suppliers  = Request::input('suppliers');

        if($image) {

            $destinationPath = public_path() . '/uploads/events/';
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


        /**
         * Vincular os fornecedores
         */
        if (count($suppliers)) {
            // Remove as imagens para cadastra-las novamente
            foreach ($suppliers as $supplierId) {
                $supplierRepo = new Repository(new Supplier());
                $supplierVo = $supplierRepo->find($supplierId);

                // Save the pivot table
                $vo->suppliers()->save($supplierVo);
            }
        }
    }

}