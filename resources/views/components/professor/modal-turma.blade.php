@if ($ids)
    <button type="button" class="btn btn-primary btn-sm bg-math" data-bs-toggle="modal" data-bs-target="#modal-{{ $key }}">
        <i class="fa-solid fa-chart-simple"></i>
        <i class="fa-solid fa-chart-pie"></i> Detalhes
    </button>

    <div class="modal fade" id="modal-{{ $key }}" tabindex="-1" aria-labelledby="modal-{{ $key }}-Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-{{ $key }}Label">
                    Graficos de Desempenho da Turma
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:aluno-chart :ids="$ids" :operacoes="$operacoes" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
@endif