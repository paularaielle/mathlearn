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
        <ul class="list-group list-group-flush">
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
                    <i class="fa-regular fa-user"></i>
                    <b>{{ $user->nome }}</b>
                </li>
                <li class="list-group-item list-group-item-light pt-2 pb-2">
                    <i class="fa-regular fa-envelope"></i>
                    {{ $user->email }}
                </li>
                <li class="list-group-item list-group-item-light pt-2 pb-2">
                    <i class="fa-regular fa-address-card"></i>
                    {{ $user->strPerfil() }}
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