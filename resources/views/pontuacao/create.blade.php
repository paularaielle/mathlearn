<x-app-layout>
    <div class="container">
        <x-message />
        <div class="row">
            <div class="col-12">
                <livewire:tabuada-form-post :tabuada="$tabuada" :operacao="$operacao"/>
            </div>
        </div>
    </div>
</x-app-layout>