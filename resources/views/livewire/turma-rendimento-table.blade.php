<div class="row">

    <div class="col-12">

        <nav class="nav nav-pills flex-column flex-sm-row py-4">
            @foreach ($turmas as $m)
                <button
                    type="button"
                    class="flex-sm-fill border border-2 mx-2 text-sm-center nav-link {{ $active == $m->id ? ' border-white text-white ' : '' }}"
                    wire:click="click('{{ $m->id }}')">
                    {{ $m->nome }}
                </button>
            @endforeach
        </nav>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <div class="text-center">
                            <div wire:loading>
                                <div class="fa-3x w100" style="height: 200px;">
                                    <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                </div>
                            </div>
                        </div>


                        <table class="table table-striped" wire:loading.remove>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Pontuação</th>
                                    <th scope="col">Nome</th>

                                    @foreach($operadores as $m)
                                        <th scope="col">
                                            <img src="{{ asset($m->imagem) }}" title="{{ $m->nome }}" width="20">
                                            {{ $m->nome }}
                                        </th>
                                    @endforeach
                                    {{-- <th scope="col" class="text-center">Aproveitamento %</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            <ol class="list-group list-group-numbered">
                                @foreach ($alunos as $i => $a)
                                    <tr>
                                        <td scope="row">{{ $i + 1 }}</td>
                                        <td class="text-center">{{ $a->pontuacao ? $a->pontuacao : 0 }}</td>
                                        <td>
                                            {{ $a->nome }}
                                            <br>
                                            Medalha: {!! $a->iconMedal() !!}
                                        </td>
                                            {{-- <ul class="list-group list-group-flush"> --}}
                                        @foreach($operadores as $m)
                                            <td>
                                            @php
                                                $key = md5($a->id . $m->id);
                                            @endphp
                                                {{-- <div class="w-100 justify-content-between">
                                                    <img src="{{ asset($m->imagem) }}" title="{{ $m->nome }}" width="20">
                                                    {{ $m->nome }}
                                                    <span class="badge bg-muted rounded-pill float-end">
                                                        {{ $a->aproveitamento($m->id) }}% de aproveitamento
                                                    </span>
                                                </div> --}}
                                                <span class="text-warning">{{ $a->aproveitamento($m->id) }}% de aproveitamento</span>
                                                <br>
                                                <span class="text-light">{{ $a->totalResposta($m->id) }} total de questões</span>
                                                <br>
                                                <span class="text-success">{{ $a->acertos($m->id) }} acertos</span>
                                                <br>
                                                <span class="text-danger">{{ $a->erros($m->id) }} erros</span>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </ol>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

