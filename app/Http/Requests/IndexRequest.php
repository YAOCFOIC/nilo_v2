<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'tel'=>'required|numeric|size:10',
            'nit'=>'required|unique:Informations,nit',
            'name'=>'required|string',
            'activity_id'=>'required|string|', 
            'g-recaptcha-response' => 'required',
        ];
    }
}
