<?php

namespace App\Wines\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterWinesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'filter' => 'required'
        ];
    }
}