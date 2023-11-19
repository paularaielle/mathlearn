<div>
    @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso.</strong>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = session('danger'))
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</div>