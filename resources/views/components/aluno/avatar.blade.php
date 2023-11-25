@if ($model)
    <div class="col-6">
        <input type="hidden" name="avatar" value="{{ $model->avatar }}">

        <div class="row justify-content-md-center mt-5">
            <button
                class="border border-5 border-white rounded-circle"
                style="overflow: hidden; width: 250px; height: 250px;">
                <img
                    src="{{ asset('img/avatar/batman.png') }}"
                    class="mx-auto"
                    width="230px"
                    title="Avatar: {{ $model->nome }}">
            </button>
        </div>

        <div class="row justify-content-md-center mt-5">
            @foreach (config('avatar') as $name => $avatar)
                <button
                    class="border border-5  border-white rounded-circle m-2"
                    style="overflow: hidden; width: 100px; height: 100px;" disabled>
                    <img
                        src="{{ asset($avatar['img']) }}"
                        class="mx-auto"
                        width="70px"
                        title="Avatar: {{ $name }}">
                </button>
            @endforeach
        </div>
    </div>
@endif