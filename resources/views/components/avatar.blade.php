@if ($model)
    <div class="col-6">
        <input type="hidden" name="avatar" value="">

        <div class="row justify-content-md-center mt-5">
            <button
                type="button"
                class="border border-5 border-warning rounded-circle bg-light p-0"
                style="overflow: hidden; width: 250px; height: 250px;">
                <img
                    src="{{ $model->src() }}"
                    class="mx-auto avatarSrc"
                    width="230px"
                    title="Avatar: {{ $model->nome }}">
            </button>
        </div>

        <div class="row justify-content-md-center mt-5">

            <div class="col-12">
                @foreach (config('avatar') as $name => $avatar)
                    @php
                        //$disabled =  $model->pontuacao < $avatar['pontos'];
                    @endphp

                    <button
                        type="button"
                        class="
                            border border-5 border-warning avatarClick
                            rounded-circle m-2 {{ $model->avatar == $avatar['img'] ? 'border-success' : '' }}
                            position-relative"
                        style="overflow: hidden; width: 100px; height: 100px;"
                        data-avatar="{{ $avatar['img'] }}">
                        {{-- {{ $disabled ? 'disabled' : '' }}> --}}
                        {{-- @if ($disabled)
                            <div style="width: 200px; height: 200px;" class="position-absolute top-0 start-0 bg-dark p-5 bg-opacity-75">
                            </div>
                        @endif --}}

                        <img src="{{ asset($avatar['img']) }}"
                            class="mx-auto"
                            width="70px"
                            title="Avatar: {{ $name }}">
                    </button>
                @endforeach
            </div>
        </div>
    </div>
@endif