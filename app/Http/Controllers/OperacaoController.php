<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OperacaoRequest;
use App\Models\Operacao;

class OperacaoController extends BaseController
{
    protected $path = 'operacao';
    protected $router = 'operacao';

    public function index()
    {
        return view($this->index)->with('models', Operacao::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->create)->with('model', new Operacao);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperacaoRequest $request)
    {
        if (Operacao::create($request->all())) {
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
        $model = Operacao::find($id);

        return view($this->show)->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Operacao::find($id);

        return view($this->edit)->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OperacaoRequest $request, string $id)
    {
        $model = Operacao::find($id);

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
        if (Operacao::find($id)->delete()) {
            request()->session()->flash('success', 'Registro excluído');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }
}
