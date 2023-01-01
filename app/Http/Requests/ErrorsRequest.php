<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorsRequest extends FormRequest
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
                'nim' => 'required|min:5|unique:students',
                'fullname' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'room' => 'required',
                'faculty' => 'required',
                'image' => 'required|file|max:2048',
                'parentname' => 'required',
                'parentphone' => 'required',
                'parentaddress' => 'required',
                'parentcity' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'nim.required' => 'Please enter a correct NIM ',
            'nim.min' => 'NIM Only ',
            'fullname.required' => 'Please enter a correct Full Name',
            'gender.required' => 'Please choose a Gender',
            'phone.required' => 'Please enter a correct Phone Number',
            'room.required' => 'Please choose a Room',
            'faculty.required' => 'Please choose a Faculty',
            'parentname.required' => 'Please enter a correct Parent Name',
            'parentphone.required' => 'Please enter a correct Parent Phone',
            'parentaddress.required' => 'Please enter a correct Parent Address',
            'parentcity.required' => 'Please enter a correct Parent City',
        ];
    }
}
