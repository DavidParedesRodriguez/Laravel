<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar a true para permitir que todos los usuarios realicen la solicitud
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:50',
        ];
    }


    public function messages()
{
    return [
        'titulo.required' => 'El título es obligatorio :(',
        'titulo.min' => 'El título debe tener al menos :min caracteres!!!!!!!!!!!!!',
        'contenido.required' => 'El contenido es OBLIGATORIO',
        'contenido.min' => 'El contenido debe tener al menos :min caracteres :/',
    ];
}
}
