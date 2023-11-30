<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-house"></i>
                    Bem vindo
                </h2>

                <div class="row mt-5">

                    <div class="col-12">
                        <h3>
                            Olá <b>{{ $user->nome }}</b>, clique na turma que você deseja consultar o redimento.
                        </h3>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="row">
                            @foreach ($turmas as $m)
                                @php
                                    $alunos = $m->alunos();
                                @endphp
                                <div class="col-4">
                                    <div class="card shadow-lg">
                                        <div class="card-body">
                                            <a
                                            href="{{ route('turma.alunos', $m->id) }}"
                                            class="text-white">
                                                <h3 class="card-title">
                                                    {{ strtoupper($m->nome) }}
                                                </h3>
                                            </a>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Turno: {{ $m->turno }}</li>
                                            <li class="list-group-item">
                                                Total de Alunos: {{ $m->totalAlunos()}}
                                            </li>
                                        </ul>
                                        <div class="card-body">

                                          {{-- <a
                                            href="{{ route('turma.alunos', $m->id) }}"
                                            class="text-white btn btn-outline-light btn-sm bg-math">
                                              <i class="fa-solid fa-chalkboard"></i>
                                              Detalhes
                                          </a> --}}
                                            @include('components.professor.modal-turma', [
                                                'key' => md5($m->id . 'turma'),
                                                'operacoes' => $operacoes,
                                                'ids' => $alunos->pluck('id')->all(),
                                            ])

                                            @include('components.professor.modal-redimento', [
                                                'key' => md5($m->id . 'redimento'),
                                                'turma' => $m,
                                            ])
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <livewire:turma-rendimento-table :turmas="$turmas" /> --}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
