<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Curso;

class CursoService
{
    public function __construct(
        private Curso $curso
    ){}

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço que retorna a página inicial dos cursos.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function consultar()
    {
        $search = request()->get('search');
        return $this->curso->when($search, function ($query, $search) {
            return $query->where('nome_curso', 'like', '%'.$search.'%')->orWhere('nome_curso', 'like', '%'.$search.'%');
        })->paginate(10);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para cadastro um novo curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function criar($data)
    {
        DB::transaction(function () use($data) {
            Curso::create($data);
        });
        return redirect()->route('curso.index')->with('success', trans('validation.create-success'));
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para editar um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function editar($data, Curso $curso)
    {
        DB::transaction(function () use ($data, $curso) {
            $curso->update($data);
        });
        return redirect()->route('curso.index')->with('success', trans('validation.update-success'));
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para excluir um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function excluir(Curso $curso)
    {
        DB::transaction(function () use ($curso) {
            $curso->delete();
        });
        return redirect()->route('curso.index')->with('success', trans('validation.delete-success'));
    }
}
