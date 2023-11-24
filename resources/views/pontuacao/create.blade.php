<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <h2>
                    <i class="fa-solid fa-calculator"></i>
                    Tabuada
                </h2>

                <div class="row mt-5">
                    <div class="col-12">
                        <livewire:tabuada-form-post :tabuada="$tabuada" :operacao="$operacao"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>