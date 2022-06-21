<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCursoRequest;
use App\Models\Curso;
use App\Services\CursoService;

class CursoController extends Controller
{
    public function __construct(
        private CursoService $cursoService
    ){}

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama o serviço que retorna a página inicial.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function index()
    {
        return view('secretaria.curso.index', [
            'cursos' => $this->cursoService->consultar()
        ]);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Retorna a view/formulário de cadastro de um novo curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function create()
    {
        return view('secretaria.curso.cadastrar');
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama um serviço para cadastrar um novo curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function store(StoreUpdateCursoRequest $request)
    {
        return $this->cursoService->criar($request->validated());
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama o serviço que retorna o formulário para visualização de um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function show(Curso $curso)
    {
        return view('secretaria.curso.visualizar', [
            'curso' => $curso
        ]);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama o serviço que retorna o formulário para edição de um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function edit(Curso $curso)
    {
        return view('secretaria.curso.editar', [
            'curso' => $curso
        ]);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama o serviço para atualizar um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function update(StoreUpdateCursoRequest $request, Curso $curso)
    {
        return $this->cursoService->editar($request->validated(), $curso);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Chama o serviço para excluir um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function destroy(Curso $curso)
    {
        return $this->cursoService->excluir($curso);
    }
}
