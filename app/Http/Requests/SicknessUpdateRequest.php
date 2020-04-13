<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SicknessUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mature_id' => 'required|integer',
            'comorbidity_id' => 'required|integer',
            'observation' => 'required|string',
        ];
    }
}
