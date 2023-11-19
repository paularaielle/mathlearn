<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome do professor</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            <tr>
                <td scope="row">{{ $m->nome }}</td>
                <td>@mdo</td>
            </tr>
        @endforeach
    </tbody>
</table>