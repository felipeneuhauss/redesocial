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
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Auth;
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
                'complement' => 'required|max:255',
                'image' => 'required|max:255',
                'link' => 'required|max:255',
                'phone' => 'required|max:15',
                'email' => 'required|max:200|email',
                'site' => 'required|max:255',
                'facebook' => 'required|max:255',
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
                'complement.required' => 'O campo Complemento é obrigatório',
                'complement.max' => 'O campo Complemento deve ter no máximo 255 caracteres',
                'image.required' => 'O campo Imagem é obrigatório',
                'image.max' => 'O campo Imagem deve ter no máximo 255 caracteres',
                'link.required' => 'O campo Link é obrigatório',
                'link.max' => 'O campo Link deve ter no máximo 255 caracteres',
                'phone.required' => 'O campo Telefone é obrigatório',
                'phone.max' => 'O campo Telefone deve ter no máximo 15 caracteres',
                'email.required' => 'O campo Email é obrigatório',
                'email.max' => 'O campo E-mail deve ter no máximo 200 caracteres',
                'email.date' => 'O campo E-mail deve ser um e-mail válido',
                'site.required' => 'O campo Site é obrigatório',
                'site.max' => 'O campo Site deve ter no máximo 255 caracteres',
                'facebook.required' => 'O campo Facebook é obrigatório',
                'facebook.max' => 'O campo Facebook deve ter no máximo 255 caracteres',
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
            $starsRatingResume = \App\Models\Rating::calculateEventStarsQuantityResume($vo->category_id, $vo->sub_category_id, $vo->supplier->id);
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
            \App\Models\EventGallery::where('Event_id', $vo->id)->delete();

            foreach ($galleries as $gallery) {
                $destinationPath = public_path() . '/uploads/Events/'.md5($vo->id);
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
            \App\Models\EventCategory::where('Event_id', $vo->id)->delete();
            foreach ($categories as $category) {
                // Pega o objeto da categoria
                $categoryVo = \App\Models\Category::find($category);

                $vo->categories()->save($categoryVo);
            }
        }
    }

}