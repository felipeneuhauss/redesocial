<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\RequestInterface;
use App\Http\Requests\Request;

class ProductRequest extends Request implements RequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'nome' => 'required|max:100|min:3',
                'descricao' => 'required|max:255',
                'valor' => 'required|numeric'
            ];
        }

        return array();
    }

    public function messages() {
        return [
            'nome.required' => 'O campo :attribute é obrigatório.',
            'descricao.required' => 'O campo :attribute é obrigatório.',
            'valor.required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'O campo :attribute deve ter no mínimo 3 caracteres.',
            'valor.numeric' => 'O campo :attribute deve ser um número.',
        ];
    }
}
