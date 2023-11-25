<x-app-layout>
    <div class="container">
                {{-- <div class="card shadow"> --}}

                    {{-- <div class="card-header"> --}}
        <h2>
            <i class="fa-regular fa-pen-to-square"></i>
            Editar perfil: {{ $model->nome }}
        </h2>
                        {{-- <a href="{{ route($router . '.index') }}" class="btn btn-dark float-end text-with">
                            <i class="fa-solid fa-arrow-left"></i>
                            Voltar
                        </a> --}}
                    {{-- </div> --}}

                    {{-- <div class="card-body"> --}}
                        {{-- <h2>Em construção</h2> --}}


        <form method="POST" action="{{ route('salvarPerfil') }}" class="needs-validation row" novalidate>
            @csrf

            <div class="col-6">
                <div class="row justify-content-md-center mt-5">
                    <button
                        class="border border-5 rounded-circle"
                        style="overflow: hidden; width: 250px; height: 250px;">
                        <img
                            src="{{ asset('img/avatar/batman.png') }}"
                            class="mx-auto"
                            width="230px"
                            title="Avatar: {{ $model->nome }}">
                    </button>
                </div>

                <div class="row justify-content-md-center mt-5">
                    @foreach ([1, 2,3,4,3,4,5,6,7,7] as $item)
                        <button
                            class="border border-5 rounded-circle m-2"
                            style="overflow: hidden; width: 100px; height: 100px;">
                            <img
                                src="{{ asset('img/avatar/batman.png') }}"
                                class="mx-auto"
                                width="70px"
                                title="Avatar: {{ $model->nome }}">
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="col-6">

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