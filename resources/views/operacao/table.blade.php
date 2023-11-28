<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Simbolo</th>
            <th scope="col">Nome da operação</th>
            <th scope="col">Operador</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $m)
            <tr>
                <td scope="row">
                    <img src="{{ asset($m->imagem) }}" title="{{ $m->nome }}" width="20">
                </td>
                <td scope="row">{{ $m->nome }}</td>
                <td>{{ $m->simbolo }}</td>
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