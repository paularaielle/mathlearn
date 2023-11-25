<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome da turma</th>
            <th scope="col">Turno</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            <tr>
                <td scope="row">{{ $m->nome }}</td>
                <td>{{ $m->turno }}</td>
                <td class="col-3">
                    <x-forms.actions
                        id="{{ $m->id }}"
                        :delete="false"
                        router="{{ $router }}"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>