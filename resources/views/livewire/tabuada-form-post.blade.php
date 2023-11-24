<div>

    <form wire:submit="save" class="row">
        {{-- <input type="hidden" wire:model="tempo" id="hiddenCounter"> --}}
        <input type="hidden" wire:model="tabuada_id" value="{{ $tabuada->id }}">
        <input type="hidden" wire:model="operacao_id" value="{{ $operacao->id }}">
        <input type="hidden" wire:model="operador" value="{{ $operador }}">

        <div class="col-2 box-cron">
            <img src="{{ asset('img/simbolos/cronometro.png') }}" alt="Cronometro" width="150px">
            <h2 wire:poll.1s="cronStart">{{ $tempo }}</h2>
        </div>

        <div class="col-8 box-calc">
            <div class="row">
                <div class="col-12 mb-5">
                    Digite a resposta (número)
                </div>

                <div class="col-2">
                    {{ $operador }}
                </div>
                <div class="col-3">
                    <img
                        src="{{ asset($operacao->imagem) }}"
                        alt="Operador: {{ $operacao->simbolo }}"
                        width="100px">
                    {{-- {{ $operacao->simbolo }} --}}
                </div>
                <div class="col-2">
                    {{ $tabuada->numero }}
                </div>

                <div class="col-2">
                    =
                </div>

                <div class="col-3">
                    <input type="number" wire:model="resposta" wire:keydown.enter="responder()">
                </div>
            </div>
        </div>

        <div class="col-2 box-cron">
            <br>
            <h2>Questões</h1>
            <br>
            <h2>{{ $operador }}/10</h1>
        </div>
    </form>
</div>
