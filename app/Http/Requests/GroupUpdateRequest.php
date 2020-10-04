<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupUpdateRequest extends FormRequest
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

         'group_number' => 'required|integer|min:5',
         'department_id' => 'required|integer|min:1',
         'course' => 'required|integer|min:1',
         
        ];

    }
}
