<?php

namespace App\Http\Requests;

use App\Http\Requests\CategoryRequest;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    use CategoryRequest {
        rules as traitrules;
        messages as traitmessages;
    }
    
    public function rules()
    {
        return array_merge(
            $this->traitrules(), 
            ['category' => 'required|min:2|max:60|unique:category, category']
        );
    }
    
    public function messages() {
        $unique   = 'El campo :attribute debe ser único.';
        return array_merge(
            $this->traitmessages(), 
            ['name.unique' => $unique]
        );
    }
}
