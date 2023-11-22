<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;

class ProfessorController extends BaseController
{
    protected $path = 'professor';
    protected $router = 'professor';

    public function index()
    {
        return view($this->index)->with('models', Professor::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->create)->with('model', new Professor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessorRequest $request)
    {
        if (Professor::create($request->all())) {
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
        $model = Professor::find($id);

        return view($this->show)->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Professor::find($id);

        return view($this->edit)->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfessorRequest $request, string $id)
    {
        $model = Professor::find($id);

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
        if (Professor::find($id)->delete()) {
            request()->session()->flash('success', 'Registro excluído');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }
}
