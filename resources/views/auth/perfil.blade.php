<x-app-layout>
    <div class="container">
        <x-message />
        <h2>
            <i class="fa-regular fa-pen-to-square"></i>
            Editar perfil: {{ $model->nome }}
        </h2>

        <form method="POST" action="{{ route('salvarPerfil') }}" class="needs-validation row" enctype="multipart/form-data" autocomplete="off">
            @csrf

            @if($model->isAluno())
                @include('components.aluno.avatar')
            @else
                @include('components.avatar')
            @endif

            <div class="col-6">

                <x-forms.input
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

                @if($model->isAluno())
                    <x-forms.input
                        type="text"
                        placeholder="Turma"
                        label="Turma"
                        name="turma"
                        value="Turma-teste"
                        disabled/>
                @endif

                <x-forms.input
                    type="password"
                    placeholder="Senha"
                    label="Senha"
                    name="password"
                    autocomplete="off"
                />

                <x-forms.input
                    type="password"
                    placeholder="Confirmar senha"
                    label="Confirmar senha"
                    name="password_confirmation"
                    autocomplete="off"
                    />

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-math">
                        <i class="fa-regular fa-floppy-disk"></i>
                        Salvar
                    </button>
                </div>
            </div>
        </form>
        {{-- </div> --}}
    </div>
</x-app-layout>