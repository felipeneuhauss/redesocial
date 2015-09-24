<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 15/09/15
 * Time: 10:32
 */

namespace App\Http\Requests\Contracts;


interface RequestInterface {

    public function authorize();
    public function rules();
    public function messages();
} 