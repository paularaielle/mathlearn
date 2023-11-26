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

                    <div class="col-12">
                        <div class="row">
                            @foreach ($turmas as $m)
                                <div class="col-3 p-5 d-grid gap-2">
                                    <a
                                        href="{{ route('turma.alunos', $m->id) }}"
                                        class="btn btn-outline-light btn-lg btn-operacao"
                                    >
                                        <i class="fa-solid fa-chalkboard"></i>
                                        {{ $m->nome }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
