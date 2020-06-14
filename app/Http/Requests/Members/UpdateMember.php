<?php

namespace App\Http\Requests\Members;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMember extends FormRequest
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
            'name'=>'required|max:25',
            'password'=>'nullable|min:8',
            'email'=>'required|email',
            'department'=>'sometimes|max:20',
            'phone_number'=>'sometimes|max:13',
            'avatar' => 'nullable|image',
            'password_confirm'=>'same:password'
        ];
    }
}
