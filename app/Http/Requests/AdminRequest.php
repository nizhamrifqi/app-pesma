<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            //
            'username' => 'required|min:5|unique:admin',
            'fullname' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'fullname.required' => 'Please enter a correct Full Name',
        ];
    }
}
