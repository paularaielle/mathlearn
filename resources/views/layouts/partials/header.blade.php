<header class="navbar navbar-dark bg-dark navbar-expand-lg bg-light mb-5 shadow">
    <div class="container-fluid">
        {{-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> --}}
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/mathlearn/LOGO.png') }}" width="150px" />
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('turma.index') }}">Turma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('professor.index') }}">Professor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Aluno</a>
                </li>
            </ul>
        </div>

        <form class="d-flex" role="search">
            {{-- <input type="search" class="form-control" placeholder="Search..." aria-label="Search"> --}}
        </form>

        <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);">
              {{-- <li><a class="dropdown-item" href="#">New project...</a></li> --}}
              {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
              {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
              {{-- <li><hr class="dropdown-divider"></li> --}}
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        {{-- </div> --}}
    </div>
</header>