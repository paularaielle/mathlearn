<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-chart-line"></i>
                    Bem vindo {{ $user->nome }}
                </h2>

            </div>
        </div>
    </div>
</x-app-layout>