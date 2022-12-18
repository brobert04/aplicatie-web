<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return string[]
     */
    public function authorize()
    {
        return [
            'name'=>'required|max:50',
            'phone_number'=>'max:100|',
            'address'=>'max:100',
            'role'=>'required',
            'profile_photo'=>'max:2048',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name.required'=>'Numele este obligatoriu',
            'name.max'=>'Numele nu poate avea mai mult de 50 de caractere',
            'email.required'=>'Email-ul este obligatoriu',
            'email.email'=>'Email-ul nu este valid',
            'phone_number.max'=>'Numărul de telefon nu poate avea mai mult de 100 de caractere',
            'address.max'=>'Adresa nu poate avea mai mult de 100 de caractere',
            'role.required'=>'Rolul este obligatoriu',
            'profile_photo.max'=>'Imaginea nu poate avea mai mult de 2MB',
        ];
    }
}
