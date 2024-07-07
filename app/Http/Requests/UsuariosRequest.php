<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','min:6','max:25'],
            'email'=>['required|email'],
        ];
    }
    public function messages(): array{
        return [
            'name.required'=>'Indique el nombre de su usuario',
            'name.min'=>'Su nombre debe contar con minimo 5 caracteres',
            'name.max'=>'Su nombre debe contener como maximo 25',
            'email.required'=>'Indique un email en formato',
        ];
    }
}
