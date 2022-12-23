<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password'=>'required|min:8',
            'newpassword'=>'required|min:8',
            'password_confirmation'=>'required|min:8|same:newpassword',
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Introdu parola curentă!',
            'password.min'=>'Parola trebuie să aibă minim 8 caractere!',
            'newpassword.required' => 'Introdu noua parolă!',
            'newpassword.min'=>'Parola trebuie să aibă minim 8 caractere!',
            'password_confirmation.required' => 'Confirmă noua parolă!',
            'password_confirmation.min'=>'Parola trebuie să aibă minim 8 caractere!',
        ];
    }
}
