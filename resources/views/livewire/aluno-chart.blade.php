
<div class="row">

    <div class="col-12">

        <nav class="nav nav-pills flex-column flex-sm-row py-4">
            <button
                type="button" class="flex-sm-fill text-sm-center nav-link {{ $active == 'all' ? ' text-white' : '' }}"
                wire:click="clickAll()">
                <i class="fa-solid fa-chart-pie"></i>
                Todos
            </button>

            @foreach ($operacoes as $m)
                <button
                    type="button"
                    class="flex-sm-fill text-sm-center nav-link {{ $active == $m->id ? ' text-white' : '' }}"
                    wire:click="clickPorOperador('{{ $m->id }}', '{{ $m->nome }}')">
                    {{ $m->nome }}
                </button>
            @endforeach
        </nav>

        <div class="row">
            <div class="col-6">
                <div class="card rounded-4 bg-light bg-gradient" style="height: 400px;">
                    <div class="card-body">
                        <livewire:livewire-column-chart
                            key="{{ $chartColumn->reactiveKey() }}"
                            :column-chart-model="$chartColumn"
                        />
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card rounded-4 bg-light bg-gradient" style="height: 400px;">
                    <div class="card-body">
                        <livewire:livewire-pie-chart
                            key="{{ $pieChart->reactiveKey() }}"
                            :pie-chart-model="$pieChart"
                        />
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

