<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    <fieldset @disabled(isset($disabled))>
        @csrf
        {{ get_method ($method) }}

        <x-forms.input type="text" placeholder="Nome" name="nome" value="{{ $model->nome }}" />

        <x-forms.input type="text" placeholder="Simbolo" name="simbolo" value="{{ $model->simbolo }}" />

        <x-forms.input type="text" placeholder="Imagem" name="imagem" value="{{ $model->imagem }}" />

        <x-forms.input type="text" placeholder="Icon" name="icon" value="{{ $model->icon }}" />

        <button type="submit" class="btn btn-lg btn-math">
            <i class="fa-regular fa-floppy-disk"></i>
            Salvar
        </button>
    </fieldset>
</form>