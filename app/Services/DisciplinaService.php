<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Disciplina;

class DisciplinaService
{
    public function __construct(
        private Disciplina $disciplina,
    ){}

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para listar todas as disciplinas
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function consultar()
    {
        $search = request()->get('search');
        return $this->disciplina->when($search, function ($query, $search) {
            return $query->where('nome_disciplina', 'like', '%'.$search.'%')->orWhere('carga_horaria', 'like', '%'.$search.'%');
        })->paginate(10);
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para criar uma nova disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function criar($data)
    {
        DB::transaction(function () use ($data) {
            Disciplina::create($data);
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.create-success'));
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para editar uma disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function editar($data, Disciplina $disciplina)
    {
        DB::transaction(function () use ($data, $disciplina) {
            $disciplina->update($data);
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.update-success'));
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para excluir uma disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function excluir(Disciplina $disciplina)
    {
        DB::transaction(function () use ($disciplina) {
            $disciplina->delete();
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.delete-success'));
    }
}
