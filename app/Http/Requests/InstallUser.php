<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallUser extends FormRequest
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
            "email"   =>"email|required|min:3|unique:users",
            "bio"     =>"required|min:3",
            "password"=>"required|min:3|confirmed",
        ];
    }
}
