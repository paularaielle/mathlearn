<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use App\Models\PessoaTurma;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AlunoController extends BaseController
{
    protected $title = 'Aluno';
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
        return view($this->create)
            ->with('model', new Aluno)
            ->with('password_temp', Str::random(8));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoRequest $request)
    {
        $passwordTemp = $request->password_temp;

        $data = [
            'password' => Hash::make($passwordTemp),
            'perfil' => 1
        ];

        DB::beginTransaction();

        if ($model = Professor::create($request->all() + $data)) {
            $this->saveTurmas($request, $model->id);
            DB::commit();

            $request->session()->flash('success', 'Registro criado');
            session()->flash('password_temp', $passwordTemp);

            return $this->redirectShow($model->id);
        }
        DB::rollBack();
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Aluno::find($id);

        $this->getIdsTurmas($id);

        return view($this->show)->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Aluno::find($id);

        $this->getIdsTurmas($id);

        return view($this->edit)->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
            'nickname' => 'required',
            'email' => 'required|email',
        ]);

        DB::beginTransaction();
        $model = Aluno::find($id);

        if ($model->update($request->all() + [ 'perfil' => 1 ])) {
            $this->saveTurmas($request, $id);
            DB::commit();

            $request->session()->flash('success', 'Registro atualizado');
            return $this->redirectIndex();
        }
        DB::rollBack();
        $request->session()->flash('danger', 'Falha ao criar registro!');

        return back()->withInput();
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

    protected function getIdsTurmas ($id) {
        $model = PessoaTurma::where('user_id', $id)->first();

        view()->share('turma_id', $model->turma_id);
    }

    protected function saveTurmas ($request, $id)
    {
        $turmaId = $request->turma_id;

        if ($id) PessoaTurma::where('user_id', $id)->delete();

        if ($turmaId) {
            PessoaTurma::create([
                'turma_id' => $turmaId,
                'user_id' => $id,
                'ativo' => true,
            ]);
        }
    }
}
