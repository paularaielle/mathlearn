@inject('Turma', 'App\Models\Turma')

@php
    $ids = isset($ids) ? $ids : [];
    $turmas = $Turma::all();
@endphp

<div class="mb-3">

    <div class="card">

        <div class="card-body">
            <label for="turma_id[]" class="form-label">
                Vincule a uma ou mais turmas
            </label>

            @foreach ($turmas as $m)
                @php
                    $key = md5($m->id);
                    $checked = in_array($m->id, $ids) ? 'checked' : '';
                @endphp
                <div class="form-check form-switch">
                    <input class="form-check-input" value="{{ $m->id }}" {{ $checked }} name="turma_id[]"
                        type="checkbox" role="switch" id="flexSwitch{{ $key }}">
                    <label class="form-check-label" for="flexSwitch{{ $key }}">
                        {{ $m->nome }} (Turno: {{ $m->turno }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>

</div>