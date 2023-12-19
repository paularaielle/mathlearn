<form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
    <fieldset @disabled(isset($disabled))>

        {{ get_method ($method) }}

        @csrf

        {{-- <x-forms.input
            type="text"
            placeholder="Nome"
            label="Nome"
            name="nome"
            value="{{ $model->nome }}"/>

        <x-forms.input
            type="text"
            placeholder="Nickname"
            label="Nickname"
            name="nickname"
            value="{{ $model->nickname }}" />

        <x-forms.input
            type="text"
            placeholder="Email"
            label="Email"
            name="email"
            value="{{ $model->email }}" />

        @if(!$model->id)
            <input type="hidden" name="password" value="{{ $password_temp }}">
            <x-forms.input
                type="text"
                placeholder="Senha temporário"
                label="Senha temporário"
                name="password_temp"
                value="{{ $password_temp }}"
                disabled/>
        @endif --}}

        <button type="submit" class="btn btn-lg btn-math">
            <i class="fa-regular fa-floppy-disk"></i>
            Salvar
        </button>
    </fieldset>
</form>