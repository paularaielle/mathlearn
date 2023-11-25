<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TurmaRequest;
use App\Models\Turma;

class TurmaController extends BaseController
{
    protected $title = 'Turmas';
    protected $path = 'turma';
    protected $router = 'turma';

    public function index()
    {
        return view($this->index)->with('models', Turma::paginate());
    }

    public function create()
    {
        return view($this->create)->with('model', new Turma);
    }

    public function store(TurmaRequest $request)
    {
        if (Turma::create($request->all())) {
            $request->session()->flash('success', 'Registro criado');

            return $this->redirectIndex();
        }
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back();
    }

    public function show(string $id)
    {
        $model = Turma::find($id);

        return view($this->show)->with('model', $model);
    }

    public function edit(string $id)
    {
        $model = Turma::find($id);

        return view($this->edit)->with('model', $model);
    }

    public function update(TurmaRequest $request, string $id)
    {
        $model = Turma::find($id);

        if ($model->update($request->all())) {
            $request->session()->flash('success', 'Registro atualizado');

            return $this->redirectIndex();
        }
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back();
    }

    public function destroy(string $id)
    {
        if (Turma::find($id)->delete()) {
            request()->session()->flash('success', 'Registro excluído');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }
}
