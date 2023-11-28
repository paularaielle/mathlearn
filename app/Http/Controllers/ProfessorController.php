<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Operacao;
use App\Models\Aluno;
use App\Models\PessoaTurma;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfessorController extends BaseController
{
    protected $title = 'Professores';
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

        return view($this->create)
            ->with('model', new Professor)
            ->with('password_temp', Str::random(8));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessorRequest $request)
    {
        $passwordTemp = $request->password_temp;

        $data = [
            'password' => Hash::make($passwordTemp),
            'perfil' => 2
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
        $model = Professor::find($id);

        $this->getIdsTurmas($id);

        return view($this->show)->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Professor::find($id);

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
        $model = Professor::find($id);

        if ($model->update($request->all() + [ 'perfil' => 2 ])) {
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
        if (Professor::find($id)->delete()) {
            request()->session()->flash('success', 'Registro excluído');

            return $this->redirectIndex();
        }
        request()->session()->flash('danger', 'Falha ao excluir!');

        return back();
    }

    // Funções somente para professor
    public function alunosPorTurma(String $turmaId)
    {
        abort_if(!$turma = Turma::find($turmaId), 404);

        $ids = PessoaTurma::where('turma_id', $turmaId)->pluck('user_id')->all();

        if(! count($ids)) {
            session()->flash('danger', 'Essa turma não tem alunos!');

            return redirect()->route('dashboard');
        }

        $operacoes = Operacao::all();
        $models = Aluno::whereIn('id', $ids)
            // ->orderBy('pontuacao', 'desc')
            ->orderBy(DB::raw('ISNULL(pontuacao), pontuacao'), 'desc')
            ->get();

        return view('professor.alunos')
            ->with('models', $models)
            ->with('turma', $turma)
            ->with('operacoes', $operacoes);
    }

    protected function getIdsTurmas ($id) {
        $ids = PessoaTurma::where('user_id', $id)->pluck('turma_id')->all();
        view()->share('turmaIds', $ids);
    }

    protected function saveTurmas ($request, $id)
    {
        $turmaIds = $request->turma_id;
        if (count($turmaIds)) {
            if ($id) PessoaTurma::where('user_id', $id)->delete();

            foreach ($turmaIds as $turmaId) {
                PessoaTurma::create([
                    'turma_id' => $turmaId,
                    'user_id' => $id,
                    'ativo' => true,
                ]);
            }
        }
    }
}
