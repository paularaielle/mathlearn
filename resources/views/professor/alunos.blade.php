<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3">
                    <i class="fa-solid fa-chalkboard"></i>
                    Alunos da turma: {{ $turma->nome }}
                </h2>

                <div class="card" data-bs-theme="dark">
                    <div class="card-header">
                        Lista de Alunos
                        <a href="{{ route('dashboard') }}" class="btn btn-dark float-end text-with">
                            <i class="fa-solid fa-house"></i>
                            Principal
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome do Aluno</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Pontuação</th>
                                    <th scope="col" class="text-center">Acertos</th>
                                    <th scope="col" class="text-center">Erros</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $i => $m)
                                    <tr>
                                        <td scope="row">{{ $i+1 }}</td>
                                        <td scope="row">{{ $m->nome }}</td>
                                        <td scope="row">{{ $m->email }}</td>
                                        <td class="text-warning fw-bold text-center">{{ $m->pontuacao }}</td>
                                        <td class="text-success fw-bold text-center">{{ $m->acertos() }}</td>
                                        <td class="text-danger fw-bold text-center">{{ $m->erros() }}</td>
                                        <td class="text-center">
                                            @include('components.professor.modal-aluno', [
                                                'key' => $i,
                                                'model' => $m,
                                                'operacoes' => $operacoes,
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-body-secondary">
                        @include('components.professor.modal-turma', [
                            'key' => md5('turma'),
                            'operacoes' => $operacoes,
                            'ids' => $models->pluck('id')->all(),
                        ])

                        @include('components.professor.modal-redimento', [
                            'key' => md5('redimento'),
                            'turma' => $turma,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>