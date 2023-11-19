<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <div class="card" data-bs-theme="dark">
                    <div class="card-header">
                        Listagem
                        <a href="{{ route($router . '.create') }}" class="btn btn-dark float-end text-with">
                            <i class="fa-solid fa-plus"></i>
                            Novo
                        </a>
                    </div>
                    <div class="card-body">
                        @include($path . '.table')
                    </div>

                    <div class="card-footer text-body-secondary">
                        {{ $models->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>