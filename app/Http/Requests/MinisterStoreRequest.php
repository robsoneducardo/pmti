<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinisterStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
        ];
    }
}
