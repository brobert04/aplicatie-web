<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'phone_number'=>'max:100|',
            'address'=>'max:100',
            'role'=>'required',
            'password'=>'required|min:8|confirmed',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Numele este obligatoriu',
            'name.max'=>'Numele nu poate avea mai mult de 50 de caractere',
            'email.required'=>'Email-ul este obligatoriu',
            'email.email'=>'Email-ul nu este valid',
            'email.unique'=>'Email-ul este deja folosit',
            'phone_number.max'=>'Numărul de telefon nu poate avea mai mult de 100 de caractere',
            'address.max'=>'Adresa nu poate avea mai mult de 100 de caractere',
            'role.required'=>'Rolul este obligatoriu',
            'password.required'=>'Parola este obligatorie',
            'password.min'=>'Parola trebuie să aibă minim 8 caractere',
            'password.confirmed'=>'Parolele nu se potrivesc',
        ];
    }
}
