<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">
        <img src="{{ asset('img/mathlearn/LOGO.png') }}" width="100px" />
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            @foreach (config('menu') as $route => $item)
                <li class="list-group-item">
                    <a class="nav-link" aria-current="page" href="{{ route($route) }}">
                        {!! $item['icon'] !!}
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach

            @auth
                @php
                    $user = auth()->user()
                @endphp
                <li class="list-group-item list-group-item-light pt-4 pb-4">
                    <i class="fa-regular fa-user"></i>
                    {{ $user->nome }}
                    <br>
                    <i class="fa-regular fa-envelope"></i>
                    {{ $user->email }}
                </li>
            @endauth

            <li class="list-group-item text-danger text-center list-group-item-light">
                <a class="nav-link" aria-current="page" href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </a>
            </li>
            {{-- <li class="list-group-item">
                <a class="nav-link" href="{{ route('professor.index') }}">Professor</a>
            </li>
            <li class="list-group-item">
                <a class="nav-link" href="#">Aluno</a>
            </li> --}}
        </ul>
    </div>
</div>