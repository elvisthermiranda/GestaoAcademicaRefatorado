<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateDisciplinaRequest;
use App\Models\Disciplina;
use App\Services\DisciplinaService;

class DisciplinaController extends Controller
{
    public function __construct(
        private DisciplinaService $disciplinaService,
    ){}

    /*
    |---------------------------------------------------------------------------------------------
    |   Retorna a página inicial.
    |---------------------------------------------------------------------------------------------
    */
    public function index()
    {
        return view('secretaria.disciplina.index', [
            'disciplinas' => $this->disciplinaService->consultar()
        ]);
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Retorna a página de cadastro.
    |---------------------------------------------------------------------------------------------
    */
    public function create()
    {
        return view('secretaria.disciplina.cadastrar');
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Insere um novo registro.
    |---------------------------------------------------------------------------------------------
    */
    public function store(StoreUpdateDisciplinaRequest $request)
    {
        return $this->disciplinaService->criar($request->validated());
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Exibe todos os registros.
    |---------------------------------------------------------------------------------------------
    */
    public function show(Disciplina $disciplina)
    {
        return view('secretaria.disciplina.visualizar', [
            'disciplina' => $disciplina
        ]);
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Edita um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function edit(Disciplina $disciplina)
    {
        return view('secretaria.disciplina.editar', [
            'disciplina' => $disciplina
        ]);
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Atualiza um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function update(StoreUpdateDisciplinaRequest $request, Disciplina $disciplina)
    {
        return $this->disciplinaService->editar($request->validated(), $disciplina);
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Deleta um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function destroy(Disciplina $disciplina)
    {
        return $this->disciplinaService->excluir($disciplina);
    }
}
