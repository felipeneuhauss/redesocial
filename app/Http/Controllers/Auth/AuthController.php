<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AppController;
use App\Models\User;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;

class AuthController extends AppController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repository = new Repository(new User());
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getRegister()
    {
        $vo = $this->repository->findOrNew(Request::input('id'));

        return view('auth.register', $this->_initForm($vo));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|confirmed|min:6',
            'zip_code'  => 'required|min:9',
            'birthday'  => 'required',
            'phone'     => 'required|min:8',
            'gender'    => 'required|max:3',
            'address'   => 'required|max:255',
            'city'      => 'required|max:100',
            'country'   => 'required',
            'number'    => 'required',
            'district'  => 'required|max:100',
            'state'        => 'required|max:100',
            'term_read' => 'required',
        ], [
            'email.email'           => 'O campo E-mail deve ter um endereço válido.',
            'email.required'        => 'O campo E-mail é obrigatório.',
            'email.max'             => 'O campo E-mail deve ter no máximo 200 caracteres.',
            'name.required'         => 'O campo Nome é obrigatório.',
            'password.required'     => 'O campo Senha é obrigatório.',
            'password.confirmed'    => 'O campo Senha não combina com a confirmação.',
            'password.min'          => 'O campo Senha deve ter no mínimo 6 caracteres.',
            'zip_code.min'          => 'O campo CEP deve ter no mínimo 9 caracteres.',
            'zip_code.required'     => 'O campo CEP é obrigatório.',
            'birthday.required'     => 'O campo Data de Nascimento é obrigatório.',
            'phone.required'        => 'O campo Telefone é obrigatório.',
            'phone.min'             => 'O campo Telefone deve ter no mínimo 8 digitos.',
            'gender.required'       => 'O campo Sexo é obrigatório.',
            'gender.max'            => 'O campo Sexo deve ter no máximo 3 caracteres.',
            'address.max'           => 'O campo Endereço deve ter no máximo 255 caracteres.',
            'address.required'      => 'O campo Endereço é obrigatório.',
            'city.required'         => 'O campo Cidade é obrigatório.',
            'city.max'              => 'O campo Cidade deve ter no máximo 100 caracteres.',
            'country.required'      => 'O campo País é obrigatório.',
            'country.max'           => 'O campo País deve ter no máximo 150 caracteres.',
            'district.required'     => 'O campo Bairro é obrigatório.',
            'state.required'        => 'O campo Estado é obrigatório.',
            'number.required'       => 'O campo Número é obrigatório.',
            'state.max'             => 'O campo Estado deve ter no máximo 100 caracteres.',
            'term_read.required'    => 'Você deve concordar com os termos de uso.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $vo = $this->repository->findOrNew(isset($data['id']) ? $data['id'] : null);
        unset($data['_token']);

        $data['password'] = Hash::make($data['password']);
        $vo->fill($data);

        $vo->save();

        return $vo;
    }

    protected function _initForm($vo = null)
    {
        $genders = array(\App\Models\Enums\Gender::MASCULINO => 'Masculino',
            \App\Models\Enums\Gender::FEMININO => 'Femino');

        $countries = \App\Models\Country::lists('name','id');

        return array('vo' => $vo, 'genders' => $genders, 'countries' => $countries);
    }
}
