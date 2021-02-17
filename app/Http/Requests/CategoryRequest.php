<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

trait CategoryRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'category'          => 'required|min:2|max:50',
        ];
    }
    
    public function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $min      = 'El campo :attribute no tiene la longitud mínima requerida :min';
        $max      = 'El campo :attribute supera la longitud máxima requerida :max';
        $between  = 'El campo :attribute debe tener entre :min y :max caracteres.';
        return [
                'category.required'          => $required,
                'category.min'               => $min,
                'category.max'               => $max,
            ];
    }
    
    public function attributes() {
        return [
            'category'          => 'Nombre de la categoría',
            ];
    }
}
