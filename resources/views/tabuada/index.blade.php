<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">

                <h2>
                    <i class="fa-solid fa-calculator"></i>
                    Tabuada
                </h2>

                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav> --}}

                <div class="row mt-5">
                    <div class="col-12">
                        @foreach($tabuadas as $m)
                            <a
                                href="{{ route('pontuacao.create', [$operacao->id, $m->id]) }}"
                                class="btn btn-outline-light btn-lg btn-tabuada">
                                {{ $m->numero }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>