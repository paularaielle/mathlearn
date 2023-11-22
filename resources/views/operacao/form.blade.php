<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    <fieldset @disabled(isset($disabled))>
        @csrf

        <x-forms.input type="text" placeholder="Nome" name="nome" value="{{ $model->nome }}" />

        <x-forms.input type="number" placeholder="Simbolo" name="simbolo" value="{{ $model->simbolo }}" />

        <button type="submit" class="btn btn-lg btn-math">
            <i class="fa-regular fa-floppy-disk"></i>
            Salvar
        </button>
    </fieldset>
</form>