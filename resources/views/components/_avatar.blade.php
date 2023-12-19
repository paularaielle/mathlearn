@if ($model)
    <div class="col-6">
        <div class="row justify-content-md-center mt-5">
            <button
                type="button"
                class="border border-5 border-warning rounded-circle bg-light p-0"
                style="overflow: hidden; width: 250px; height: 250px;">
                <img
                    src="{{ $model->src() }}"
                    class="mx-auto"
                    width="230"
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