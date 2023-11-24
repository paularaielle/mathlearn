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

                    <div class="col-sm-12 col-lg-6">
                        <h3>
                            Olá <b>{{ $user->nome }}</b>, clique no operador que deseja praticar
                        </h3>
                    </div>

                    <div class="col-sm-12 col-lg-6">
                        @foreach ($operacoes as $m)
                            <a
                                href="{{ route('tabuada.index', $m->id) }}"
                                class="btn btn-outline-light btn-lg btn-operacao"
                            >
                                {{ $m->nome }}
                                <span style="color: #79c9fa;">
                                    {!! $m->imagem !!}
                                </span>
                            </a>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>