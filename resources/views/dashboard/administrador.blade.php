<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-chart-line"></i>
                    Bem vindo
                </h2>

                <div class="row mt-5">

                    @foreach (config('menu') as $route => $item)
                        <div class="col">

                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        <a href="{{ route($route) }}" class="stretched-link">
                                            {!! $item['icon'] !!}
                                            {{ $item['title'] }}
                                        </a>
                                    </h5>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
