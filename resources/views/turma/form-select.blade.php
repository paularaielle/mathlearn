@inject('Turma', 'App\Models\Turma')

@php
    $id = isset($id) ? $id : null;
    $turmas = $Turma::all();
@endphp

<div class="mb-3">

    <div class="card">

        <div class="card-body">
            <label for="turma_id" class="form-label">
                Vincule a uma turma:
            </label>

            @foreach ($turmas as $m)
                @php
                    $key = md5($m->id);
                    $checked = $m->id == $id ? 'checked' : '';
                @endphp
                <div class="form-check">
                    <input class="form-check-input" value="{{ $m->id }}" {{ $checked }} name="turma_id"
                        type="radio" role="switch" id="flexSwitch{{ $key }}">
                    <label class="form-check-label" for="flexSwitch{{ $key }}">
                        {{ $m->nome }} (Turno: {{ $m->turno }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>

</div>