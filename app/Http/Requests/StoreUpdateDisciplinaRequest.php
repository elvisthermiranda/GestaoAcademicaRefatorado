<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDisciplinaRequest extends FormRequest
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
            'nome_disciplina' => 'required',
            'carga_horaria' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nome_disciplina' => 'nome da disciplina',
            'carga_horaria' => 'carga horária',
        ];
    }
}
