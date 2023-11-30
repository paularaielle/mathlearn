<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                @if ($title)
                    <h2 class="mb-3">
                        <i class="fa-regular fa-pen-to-square"></i>
                        {{ $title }}
                    </h2>
                @endif

                @include('layouts.partials.breadcrumb', [
                    'home' => $router . '.index',
                    'startLabel' => $title,
                    'endLabel' => 'Editar',
                ])

                <div class="card shadow">

                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Editar registro
                        <a href="{{ route($router . '.index') }}" class="btn btn-dark float-end text-with">
                            <i class="fa-solid fa-arrow-left"></i>
                            Voltar
                        </a>
                    </div>

                    <div class="card-body">
                        @include($path . '.form', [
                            'action' => route($router.'.update', $model->id),
                            'method' => 'PUT',
                        ])
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>