<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubjectMarkRequest extends FormRequest
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
            'student_id' => ['required', 'integer', 'exists:users,id'],
            'semester' => ['required', 'integer', 'min:1', 'max:10'],
            'results' => ['required', 'array'],
            'results.*.subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'results.*.grade' => ['required', 'integer', 'min:0', 'max:100']
        ];
    }
}
