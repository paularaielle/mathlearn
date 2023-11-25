<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-house"></i>
                    Bem vindo
                </h2>

                <div class="row mt-5">

                    @foreach (config('menu') as $route => $item)
                        <div class="col-3 p-5 d-grid gap-2">
                            <a href="{{ route($route) }}" class="btn btn-outline-light btn-lg btn-operacao">
                                {!! $item['icon'] !!}
                                {{ $item['title'] }}
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
