<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Airport;

use App\Http\Controllers\AppController;
use App\Models\Airport;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Validator;
use Request;

class AirportController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->repository = new Repository(new Airport());
        $this->viewFolderName = 'airports';
    }

    public function _validate()
    {
        $validator = Validator::make(Request::all(), [
            'sigla' => 'required|max:5|min:3',
            'value' => 'required|max:255'
        ],  [
            'sigla.required' => 'O campo :attribute é obrigatório.',
            'value.required' => 'O campo :attribute é obrigatório.'
            ]);

        return $validator;
    }

}