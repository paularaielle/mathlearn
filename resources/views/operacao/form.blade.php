<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    <fieldset @disabled(isset($disabled))>
        @csrf
        {{ get_method ($method) }}

        <x-forms.input type="text" placeholder="Nome" name="nome" :model="$model" />

        <x-forms.input type="number" placeholder="Simbolo" name="simbolo" :model="$model" />

        <button type="submit" class="btn btn-lg btn-math">
            <i class="fa-regular fa-floppy-disk"></i>
            Salvar
        </button>
    </fieldset>
</form>