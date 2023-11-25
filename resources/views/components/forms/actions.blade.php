@props(['delete' => true])

<div class="text-end">

    @if ($delete)
        <form method="POST" action="{{ route($router . '.destroy', $id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
    @endif

        <a class="btn btn-dark btn-sm" href="{{ route($router . '.show', $id) }}" title="Detalhar">
            <i class="fa-regular fa-eye"></i>
        </a>
        <a class="btn btn-dark btn-sm" href="{{ route($router . '.edit', $id) }}" title="Editar">
            <i class="fa-regular fa-pen-to-square"></i>
        </a>

        @if ($delete)
            <button type="bubmit" class="btn btn-dark btn-sm">
                <i class="fa-regular fa-trash-can text-danger"></i>
            </button>
        @endif

    @if ($delete)
        </form>
    @endif

</div>