<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name'        => 'required',
            'description' => 'required|min:15',
            'body'        => 'required|min:30',
            'price'       => 'required|regex:/[0-9]*,[0-9]{2}/',
            'categories'  => 'required',
            'photos.*'      => 'image'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório.',
            'min' => 'Este campo deve possuir no mínimo :min caracteres.',
            'regex' => 'Valor inválido. (Ex.: 100,00)',
            'image' => 'Imagem inválida.',
        ];
    }
}
