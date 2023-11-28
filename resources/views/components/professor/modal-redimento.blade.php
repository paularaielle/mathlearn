@if ($turma)
    <button type="button" class="btn btn-primary btn-sm bg-math" data-bs-toggle="modal" data-bs-target="#modal-{{ $key }}">
        <i class="fa-solid fa-table"></i>
        <i class="fa-solid fa-percent"></i> Tabela de Redimentos
    </button>

    <div class="modal fade" id="modal-{{ $key }}" tabindex="-1" aria-labelledby="modal-{{ $key }}-Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-{{ $key }}Label">
                    Redimento por Aluno
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:turma-rendimento-table :turmas="[$turma]" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
@endif