<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'activity_id' => 'required|integer',
            'minister_id' => 'required|integer',
            'day' => 'required',
            'hour' => 'required',
        ];
    }
}
