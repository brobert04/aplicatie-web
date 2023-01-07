<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'title' => 'required|max:50',
            'subtitle' => 'max:255',
            'slug' => 'required|max:255',
            'excerpt' => 'max:6000',
            'photo' => 'max:2048',
            'meta_title' => 'max:255',
            'meta_description' => 'max:255',
            'meta_keywords' => 'max:255',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Titlul este obligatoriu',
            'title.max' => 'Titlul nu poate avea mai mult de 50 de caractere',
            'subtitle.max' => 'Subtitlul nu poate avea mai mult de 255 de caractere',
            'slug.required' => 'Slug-ul este obligatoriu',
            'slug.max' => 'Slug-ul nu poate avea mai mult de 255 de caractere',
            'excerpt.max' => 'Excerpt-ul nu poate avea mai mult de 6000 de caractere',
            'photo.max' => 'Imaginea nu poate avea mai mult de 2MB',
            'meta_title.max' => 'Meta titlul nu poate avea mai mult de 255 de caractere',
            'meta_description.max' => 'Meta descrierea nu poate avea mai mult de 255 de caractere',
            'meta_keywords.max' => 'Meta cuvintele cheie nu pot avea mai mult de 255 de caractere',

        ];
    }
}
