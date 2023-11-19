<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome da turma</th>
            <th scope="col">Turno</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $turma)
            <tr>
                <td scope="row">{{ $turma->nome }}</td>
                <td>{{ $turma->turno }}</td>
                <td>@mdo</td>
            </tr>
        @endforeach
    </tbody>
</table>