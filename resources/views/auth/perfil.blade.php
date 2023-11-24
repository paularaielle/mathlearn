<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-header">
                        <i class="fa-regular fa-address-card"></i>
                        {{ $model->nome }}
                        {{-- <a href="{{ route($router . '.index') }}" class="btn btn-dark float-end text-with">
                            <i class="fa-solid fa-arrow-left"></i>
                            Voltar
                        </a> --}}
                    </div>

                    <div class="card-body">
                        {{-- <h2>Em construção</h2> --}}


                        <form method="POST" action="{{ route('salvarPerfil') }}" class="needs-validation" novalidate>
                            <fieldset>
                                @csrf

                                <x-forms.input
                                    type="text"
                                    placeholder="Nome"
                                    label="Nome"
                                    name="nome"
                                    value="{{ $model->nome }}" disabled/>

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
                                    placeholder="Password"
                                    label="Senha"
                                    name="password"/>

                                <x-forms.input
                                    type="password"
                                    placeholder="Password"
                                    label="Confirmar senha"
                                    name="password_confirmation"/>

                                <button type="submit" class="btn btn-lg btn-math">
                                    <i class="fa-regular fa-floppy-disk"></i>
                                    Salvar
                                </button>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>