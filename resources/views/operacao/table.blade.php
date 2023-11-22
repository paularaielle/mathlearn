<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nome da operação</th>
            <th scope="col">Simbolo</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            <tr>
                <td scope="row">{{ $m->nome }}</td>
                <td>{{ $m->simbolo }}</td>
                <td class="col-3">
                    <x-forms.actions id="{{ $m->id }}" router="{{ $router }}"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>