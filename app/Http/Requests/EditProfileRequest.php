<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class EditProfileRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $id = Auth::user()->id;
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'confirmed|min:6',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,bmp'
        ];
    }
}
