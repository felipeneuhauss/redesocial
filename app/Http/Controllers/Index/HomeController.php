<?php

namespace App\Http\Controllers\Index;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use PhpSpec\Exception\Exception;
use Request;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('index.home')->with(['showSlides' => true]);
    }

    public function contact()
    {
        return view('index.contact');
    }

    public function sendContactMail() {
        if (Request::isMethod('post'))
        {
            try {

                $data = Request::all();

                Mail::send('index.contact-mail', ['data' => $data], function ($m) use ($data) {
                    $m->to('contato@aguacinza.eco.br', 'Contato')
                        ->subject($data['service'] . '-'. $data['subject'])
                        ->from($data['email'], $data['name'])
                        ->replyTo($data['email'], $data['name']);
                });

                return "E-mail enviado com sucesso! Em breve retornaremos.";
            } catch (Exception $e) {
                return "Tivemos problemas para enviar seu e-mail.". $e->getMessage();
            }
        }
    }
}
