<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcelRequest extends FormRequest
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
            'albaran' => 'required|numeric|max:10',
            'destinatario' => 'required|string|max:28',
            'direccion' => 'required|string|max:250',
            'poblacion' => 'required|string|max:10',
            'cp' => 'required|string|min:5|max:5',
            'provincia' => 'required|max:20',
            'telefono' => 'required|max:10',
            'observaciones' => 'max:500',
            'fecha' => 'required|date',
        ];
    }
}
