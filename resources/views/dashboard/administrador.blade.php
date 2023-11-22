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

