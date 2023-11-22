@push('script')
    <script src="{{ asset('js/cron.js') }}"></script>
    <script type="text/javascript">
        start();
    </script>
@endpush

<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                {{-- {{ route('pontuacao.store') }} --}}
                <form action="#" method="post">
                    <h1 id="counter">00:20</h1>
                    <input type="hidden" name="tempo" id="hiddenCounter">
                    <h1>
                        {{ $tabuada->numero }}
                        {{ $operacao->simbolo }}
                        {{ rand(1, 10) }}
                    </h1>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>