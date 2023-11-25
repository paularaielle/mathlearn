@if ($model)
    <div class="col-6">
        <div class="row justify-content-md-center mt-5">
            <button
                class="border border-5 border-white rounded-circle"
                style="overflow: hidden; width: 250px; height: 250px;">
                <img
                    src="{{ $model->src() }}"
                    class="mx-auto"
                    width="230px"
                    title="Avatar: {{ $model->nome }}">
            </button>
        </div>

        <div class="row justify-content-md-center mt-5">
            <div class="col-12">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Avatar</label>
                    <input class="form-control" type="file" name="photo">
                </div>
            </div>
        </div>
    </div>
@endif