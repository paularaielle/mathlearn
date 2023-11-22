<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-chart-line"></i>
                    Bem vindo
                </h2>

                <div class="row mt-5">

                    <div class="col-12">
                        <h3>
                            Olá <b>{{ $user->nome }}</b>, clique na turma que você deseja consultar o redimento.
                        </h3>
                    </div>

                    <div class="col-12">
                        @foreach ($turmas as $m)
                            <button type="button" class="btn btn-outline-light btn-lg border border-5 m-2 px-4 rounded-pill border-white">
                                {{ $m->nome }}
                            </button>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
