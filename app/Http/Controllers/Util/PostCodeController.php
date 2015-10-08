<?php
/**
 * Created by PhpStorm.
 * User: felipeneuhauss
 * Date: 01/09/15
 * Time: 22:04
 */

namespace App\Http\Controllers\Util;

use App\Http\Controllers\AppController;
use App\Models\PostCode;
use Request;

class PostCodeController extends AppController {


    public function getAddress($zipCode = '')
    {
        $modelZipCode = new PostCode();

        return $modelZipCode->getAddress($zipCode);
    }

}