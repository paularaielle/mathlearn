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
                                <div class="col-3">
                                    <div class="card shadow-lg">
                                        <div class="card-body">
                                          <h3 class="card-title">{{ $m->nome }}</h3>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Turno: {{ $m->turno }}</li>
                                            <li class="list-group-item">Total de Alunos: {{ $m->totalAlunos()}} </li>
                                        </ul>
                                        <div class="card-body">
                                          <a
                                            href="{{ route('turma.alunos', $m->id) }}"
                                            class="text-white stretched-link btn btn-outline-light btn-sm bg-math">
                                              <i class="fa-solid fa-chalkboard"></i>
                                              Detalhes
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <livewire:turma-rendimento-table :turmas="$turmas" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
