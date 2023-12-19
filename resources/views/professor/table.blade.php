<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome do professor</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            <tr>
                <td scope="row">{{ $m->nome }}</td>
                <td scope="row">{{ $m->nickname }}</td>
                <td scope="row">{{ $m->email }}</td>
                <td scope="row">
                    <a href="{{ route('password.index', $m->id) }}" class="btn btn-link">
                        Redefinir senha
                    </a>
                </td>
                <td>
                    <x-forms.actions id="{{ $m->id }}" router="{{ $router }}"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>