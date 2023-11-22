<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;

class AlunoController extends BaseController
{
    protected $path = 'aluno';
    protected $router = 'aluno';

    public function index()
    {
        return view($this->index)->with('models', Aluno::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->create)->with('model', new Aluno);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoRequest $request)
    {
        if (Aluno::create($request->all())) {
            $request->session()->flash('success', 'Registro criado');

            return $this->redirectIndex();
        }
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Aluno::find($id);

        return view($this->show)->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Aluno::find($id);

        return view($this->edit)->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoRequest $request, string $id)
    {
        $model = Aluno::find($id);

        if ($model->update($request->all())) {
            $request->session()->flash('success', 'Registro atualizado');

            return $this->redirectIndex();
        }
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Aluno::find($id)->delete()) {
            request()->session()->flash('success', 'Registro excluído');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }
}
