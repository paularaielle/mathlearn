<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome do Aluno</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col">Pontuação</th>
            <th scope="col">Turma</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            @php
                $turmas = $m->turmas();
            @endphp
            <tr>
                <td scope="row">{{ $m->nome }}</td>
                <td scope="row">{{ $m->nickname }}</td>
                <td scope="row">{{ $m->email }}</td>
                <td scope="row">{{ $m->pontuacao }}</td>
                <td scope="row">
                    @foreach ($turmas as $t)
                        {{ $t->nome }}
                    @endforeach
                </td>
                <td class="col-3">
                    <x-forms.actions id="{{ $m->id }}" router="{{ $router }}"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>