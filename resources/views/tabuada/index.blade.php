<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">

                @foreach($tabuadas as $m)
                    <a
                        href="{{ route('pontuacao.create', [$operacao->id, $m->id]) }}"
                        class="btn btn-outline-light btn-lg border border-5 m-2 px-4 rounded-pill border-white">
                        {{ $m->numero }}
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>