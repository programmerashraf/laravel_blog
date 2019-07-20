<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            "name"    =>"required|min:3",
            "email"   =>"email|required|min:3|unique:users,email_address,".auth()->user()->id,
            "bio"     =>"required|min:3",
            "password"=>"required|min:3",
        ];
    }

}
