<form method="POST" action="{{ route($router . '.destroy', $id) }}" class="text-end">

    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <a class="btn btn-dark btn-sm" href="{{ route($router . '.show', $id) }}" title="Detalhar">
        <i class="fa-regular fa-eye"></i>
    </a>
    <a class="btn btn-dark btn-sm" href="{{ route($router . '.edit', $id) }}" title="Editar">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
    <button type="bubmit" class="btn btn-dark btn-sm">
        <i class="fa-regular fa-trash-can text-danger"></i>
    </button>

</form>
