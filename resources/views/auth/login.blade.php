<x-guest-layout>

    @push('style')
        <link rel="stylesheet" href="{{ asset('css/pages/style_login.css') }}">
    @endpush

    <div class="container">
        <x-message />
        <div class="row justify-content-md-center">
            <div class="col col-lg-4 col-sm-6 col-md-6" style="margin: 20%">
                <form method="POST" action="{{ route('authenticate') }}" class="text-center">
                    @csrf
                    <div class="mb-3">
                        <img src="{{ asset('img/mathlearn/LOGO.png') }}" width="445px" />
                    </div>

                    <x-forms.input type="text" placeholder="Email/Nickname" name="email" icon="fa-solid fa-user"/>

                    <x-forms.input type="password" placeholder="Senha" name="password" icon="fa-solid fa-lock"/>

                    <div>
                        <a href="#">Esqueci minha senha</a>
                    </div>

                    <div class="justify-center">
                        <input type="submit" class="btn btn-lg btn-math" value="Entrar" class="btn-block" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>