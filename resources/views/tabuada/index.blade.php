<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">

                <h2>
                    <i class="fa-solid fa-calculator"></i>
                    Tabuada

                </h2>

                <nav aria-label="breadcrumb float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Operação ({{ $operacao->nome }})</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Escolha a tabuada
                        </li>
                    </ol>
                </nav>

                <div class="row mt-5 text-center justify-content-evenly">

                    @foreach($tabuadas as $m)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-2 col-xl-1 col-xxl-1 p-2 mb-2">
                            <a
                                href="{{ route('pontuacao.create', [$operacao->id, $m->id]) }}"
                                class="btn btn-outline-light btn-lg fs-1 btn-tabuada">
                                {{ $m->numero }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>