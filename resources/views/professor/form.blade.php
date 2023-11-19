<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    @csrf

    <x-forms.input type="text" placeholder="Nome" name="nome" />

    <x-forms.input type="number" placeholder="Turno" name="turno" />

    <button type="submit" class="btn btn-lg btn-math">
        <i class="fa-regular fa-floppy-disk"></i>
        Salvar
    </button>
</form>