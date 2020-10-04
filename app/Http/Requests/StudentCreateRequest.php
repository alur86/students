<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            
         'name' => 'required|min:2|max:25',
         'surname' => 'required|min:3|max:35',
         'group_id' => 'required|integer',
         'birthdate' => 'required|date_format:Y-m-d',

        ];
    }


public function messages ()
{
   return [
      'date_of_birth.date' => 'Your custom message for the invalid date of birth',
      'email.gmail' => 'Please supply a gmailaddress'
   ];
}

    
}


  