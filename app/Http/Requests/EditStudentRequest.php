<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStudentRequest extends FormRequest
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
            "name" => ['sometimes', 'string', 'min:10'],
            "email" => ['sometimes', 'email', 'unique:users,email'],
            "student_registration_number" => ['sometimes', 'string', 'min:8', 'unique:users,student_registration_number'],
        ];
    }
}
