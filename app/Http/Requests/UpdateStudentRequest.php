<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'rollno' => 'required|string|max:255|unique:students,rollno,' . $this->route('student')->id, 
            'class' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'DOB' => 'required|date',
            'nrc' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_numbers' => 'required|numeric', 
            'role_id' => 'required|exists:roles,id', 
        ];
    }

    /**
     * Get the custom messages for validation errors (optional).
     */
    public function messages()
    {
        return [
            'rollno.unique' => 'This roll number has already been taken by another student.',
            'phone_numbers.numeric' => 'Phone Number must be numbers.',
        ];
    }
}
