@props(['disabled' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>
    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
            'class' => 'form-control form-control-lg',
            'id' => $name,
            'name' => $name,
            'type' => $type
        ]) !!} >
</div>