<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-chart-line"></i>
                    Bem vindo
                </h2>

                <div class="row mt-5 mb-5">

                    <div class="col-12">
                        <h3>
                            Olá <b>{{ $user->nome }}</b>, clique no operador que deseja praticar
                        </h3>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            @foreach ($operacoes as $m)
                                <div class="col-3 p-5 d-grid gap-2">
                                    <a
                                        href="{{ route('tabuada.index', $m->id) }}"
                                        class="btn btn-outline-light btn-lg btn-operacao"
                                    >
                                        {{ $m->nome }}
                                        {!! $m->icon !!}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <livewire:aluno-chart :ids="[$user->id]" :operacoes="$operacoes" />

                </div>

            </div>
        </div>
    </div>
</x-app-layout>