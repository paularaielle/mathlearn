<div>

    <form wire:submit="saveBlockDefault" class="row">
        <input type="hidden" wire:model="operador" value="{{ $operador }}">

        <div class="col-2 box-cron">
            <img src="{{ asset('img/simbolos/cronometro.png') }}" alt="Cronometro" width="150px">
            @if ($enableSave)
                <h2>{{ $tempo }}</h2>
            @else
                <h2 wire:poll.1s="cronStart">{{ $tempo }}</h2>
            @endif
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
                    {!! $operacao->imagem !!}
                    {{-- <img
                        src="{{ asset($operacao->imagem) }}"
                        alt="Operador: {{ $operacao->simbolo }}"
                        width="100px"> --}}
                </div>
                <div class="col-2">
                    {{ $tabuada->numero }}
                </div>

                <div class="col-2">
                    =
                </div>

                <div class="col-3">
                    <span
                        class="d-inline-block"
                        tabindex="0"
                        data-bs-toggle="popover"
                        data-bs-trigger="hover focus"
                        data-bs-title="Dica Importante"
                        data-bs-content="Aperte ENTER para enviar sua resposta">
                        <input type="number"
                            wire:model="resposta"
                            wire:keydown.enter="responder()"
                            {{ $enableSave ? 'disabled' : '' }}>
                    </span>
                </div>

                @if ($enableSave)
                    <div class="col-12">
                        <button type="button" wire:click="save()" class="btn btn-lg btn-math px-5">
                            Salvar
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-2 box-cron">
            <br>
            <h2>Questões</h1>
            <br>
            <h2>{{ $questao }}/10</h1>
        </div>

    </form>

    {{-- Exibir erros e acertos QUANTITATIVOS --}}
    <div class="row justify-content-md-center text-center mt-5">
        @php
            $erros = [];
            $acertos = [];
            foreach ($respostas as $value) {
                if ($value['acerto']) $acertos[] = 1;
                else $erros[] = 1;
            }
        @endphp
        <div class="col-4 text-danger">
            <h2>
                <i class="fa-regular fa-thumbs-down"></i>
                Respostas erradas: {{ count($erros) }}
            </h2>
        </div>
        <div class="col-4 text-success">
            <h2>
                <i class="fa-regular fa-thumbs-up"></i>
                Respostas certas: {{ count($acertos) }}
            </h2>
        </div>
    </div>
</div>
