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
                            <a href="{{ route('dashboard') }}" class="text-white">Operação ({{ $operacao->nome }})</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a  href="{{ route('tabuada.index', $operacao->id) }}" class="text-white">
                                Tabuada ({{ $tabuada->numero }})
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Hora de aprender
                        </li>
                    </ol>
                </nav>

                <div class="row mt-5">
                    <div class="col-12">
                        {{-- @if ($operacao->isSub())
                            <livewire:subtracao-form-post :tabuada="$tabuada" :operacao="$operacao"/> --}}
                        @if($operacao->isDiv())
                            <livewire:divisao-form-post :tabuada="$tabuada" :operacao="$operacao"/>
                        @else
                            <livewire:tabuada-form-post :tabuada="$tabuada" :operacao="$operacao"/>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>