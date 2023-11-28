@php
    $user = auth()->user()
@endphp

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <img src="{{ asset('img/mathlearn/LOGO.png') }}" width="100px" />
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        @if ($user)
            <div class="row justify-content-md-center text-center">
                <div class="col-lg-4 mb-2">
                    <div
                        class="rounded-circle bg-light border border-5 border-warning p-0"
                        style="width: 140px; height: 140px; overflow: hidden;">
                        <img src="{{ $user->src() }}" title="{{ $user->nome }}" width="130" style="margin: auto;">
                    </div>
                </div>
                <h2 class="fw-normal mb-3">
                    <i class="fa-regular fa-user"></i>
                    {{ $user->nome }}
                </h2>

                @if ($user->isAluno())
                    <h3>
                        {!! $user->iconMedal() !!} {{ $user->pontuacao }}
                    </h3>
                @endif
            </div>
        @endif

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    Principal
                </a>
            </li>
            @if ($user->isAdmin())
                @foreach (config('menu') as $route => $item)
                    <li class="list-group-item">
                        <a class="nav-link" aria-current="page" href="{{ route($route) }}">
                            {!! $item['icon'] !!}
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            @endif

            @auth
                <li class="list-group-item list-group-item-light pt-2 pb-2">
                    <i class="fa-regular fa-envelope"></i>
                    {{ $user->email }}
                </li>
                <li class="list-group-item list-group-item-light pt-2 pb-2">
                    <i class="fa-regular fa-address-card"></i>
                    {{ $user->strPerfil() }}
                </li>

                <li class="list-group-item list-group-item-light pt-2 pb-2">
                    <a class="nav-link" aria-current="page" href="{{ route('perfil') }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                        Editar perfil
                    </a>
                </li>
            @endauth

            <li class="list-group-item text-danger text-center list-group-item-light">
                <a class="nav-link" aria-current="page" href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </a>
            </li>
        </ul>
    </div>

</div>