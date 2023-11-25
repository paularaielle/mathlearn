<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    <fieldset @disabled(isset($disabled))>
        @csrf

        <x-forms.input type="text" placeholder="Nome" name="nome" value="{{ $model->nome }}" />

        <x-forms.input type="number" placeholder="Turno" name="turno" value="{{ $model->turno }}" />

        <x-forms.input type="number" placeholder="Imagem" name="imagem" value="{{ $model->imagem }}" />

        <x-forms.input type="number" placeholder="Icon" name="icon" value="{{ $model->icon }}" />

        <button type="submit" class="btn btn-lg btn-math">
            <i class="fa-regular fa-floppy-disk"></i>
            Salvar
        </button>
    </fieldset>
</form>