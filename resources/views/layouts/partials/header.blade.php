<header class="navbar navbar-dark bg-dark navbar-expand-lg bg-light mb-5 shadow bg-navbar pt-4 pb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/mathlearn/LOGO.png') }}" width="200px" />
        </a>

        <div class="d-flex"></div>

        @auth
            @php
                $user = auth()->user()
            @endphp
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <button
                            class="rounded-circle bg-light border border-2 border-warning p-0"
                            style="width: 45px; height: 45px; overflow: hidden;"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            <img src="{{ $user->src() }}" alt="mdo" width="40" title="{{ $user->nome }}">
                        </button>
                        <button
                            class="btn btn-link btn-lg text-light"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                </div>
        @endauth
    </div>
</header>

