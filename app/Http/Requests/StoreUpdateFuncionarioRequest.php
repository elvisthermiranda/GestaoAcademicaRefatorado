<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFuncionarioRequest extends FormRequest
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
            //Valida usuário
            'user.email' => 'required',
            'user.is_activated'=> 'nullable',

            //Valida pessoa
            'pessoa.nome' => 'required',
            'pessoa.cpf' => 'required',
            'pessoa.rg' => 'required',
            'pessoa.nome_pai' => 'required',
            'pessoa.nome_mae' => 'required',
            'pessoa.telefone' => 'required',
            'pessoa.nacionalidade' => 'required',
            'pessoa.naturalidade' => 'required',
            'pessoa.titulo_eleitor' => 'required',
            'pessoa.reservista' => 'required',
            'pessoa.carteira_trabalho' => 'required',
            'pessoa.tipo_perfil_id' => 'required',

            //Validar endereço
            'endereco.rua' => 'required',
            'endereco.numero' => 'required',
            'endereco.bairro' => 'required',
            'endereco.complemento' => 'required',
            'endereco.cidade' => 'required',
            'endereco.estado' => 'required',
            'endereco.pais' => 'required',
            'endereco.cep' => 'required',

            //Validar funcionario
            'funcionario.matricula' => 'required',
            'funcionario.cargo_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'pessoa.nome_pai' => 'nome do pai',
            'pessoa.nome_mae' => 'nome da mãe',
            'pessoa.titulo_eleitor' => 'título de eleitor',
            'pessoa.carteira_trabalho' => 'carteira de trabalho',
            'pessoa.tipo_perfil_id' => 'perfil'
        ];
    }
}
