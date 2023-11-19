<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TurmaRequest;
use App\Models\Turma;

class TurmaController extends BaseController
{
    protected $path = 'turma';
    protected $router = 'turma';

    public function index()
    {
        return view($this->index)->with('models', Turma::paginate());
    }

    public function create()
    {
        return view($this->create);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TurmaRequest $request)
    {
        if (Turma::create($request->all())) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        if (Turma::delete($id)) {
            request()->session()->flash('success', 'Registro excluido');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }
}
