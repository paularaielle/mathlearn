<?php
namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunoResource;
use App\Models\Aluno;

/**
 * @tags Aluno
 */
class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Listar.
     */
    public function index()
    {
        return AlunoResource::collection(Aluno::paginate());
    }

    /**
     * Salvar.
     */
    public function store(AlunoRequest $request)
    {
        $data = $request->all() + [
            'perfil' => 1,
            'password' => encrypt('temp-pass-aluno'),
        ];

        $model = Aluno::create($data);

        return new AlunoResource($model);
    }

    /**
     * Pegar.
     */
    public function show(string $id)
    {
        if (!$model = Aluno::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        return new AlunoResource($model);
    }

    /**
     * Atualizar.
     */
    public function update(AlunoRequest $request, string $id)
    {
        if (!$model = Aluno::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }

        if (!$model->update($request->all())) {
            return response(['message' => 'Falha ao atualizar'], 400);
        }

        return new AlunoResource($model);
    }

    /**
     * Deletar.
     */
    public function destroy(string $id)
    {
        if (!$model = Aluno::find($id)) {
            return response(['message' => 'Nada encontrado'], 404);
        }
        $model->delete();

        return response(['message' => 'Deletado com sucesso'], 204);
    }
}
