<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatureUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
            'birth_at' => 'required',
            'cpf' => 'required|string|max:15',
            'registered_at' => 'required',
            'address' => 'required|string|max:45',
            'district_id' => 'required|integer',
            'NIS' => 'required|string|max:20',
        ];
    }
}
