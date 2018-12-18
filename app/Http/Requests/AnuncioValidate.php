<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioValidate extends FormRequest
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
            'title' => 'required',
            'areaU' => 'required',
            'areaB' => 'required',
            'price' => 'required',
            'address' => 'required',
            'type' => 'required',
            'qtdWC' => 'required',
            'anoConstrucao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório!',
            'areaU.required' => 'O campo área útil é obrigatório!',
            'areaB.required' => 'O campo área bruta é obrigatório!',
            'price.required' => 'O campo preço é obrigatório!',
            'address.required' => 'O campo localização é obrigatório!',
            'type.required' => 'O campo tipo de anúncio é obrigatório!',
            'qtdWC.required' => 'O campo número de casas de banho é obrigatório!',
            'anoConstrucao.required' => 'O campo ano de construção é obrigatório!'
        ];
    }
}
