@props(['disabled' => false])
@props(['icon' => 'fa-solid fa-chevron-right'])
@props(['label' => null])

@php
    $invalid = '';
@endphp

@error($name)
    @php
        $invalid = 'border border-danger-subtle'
    @endphp
@enderror

<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
        </label>
    @endif

    <div class="input-group input-group-lg">

        <span class="input-group-text {{ $invalid }}" id="inputGroup-sizing-lg">
            <i class="{{ $icon }}"></i>
        </span>

        <input
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' => 'form-control form-control-lg ' . $invalid,
                'id' => $name,
                'name' => $name,
                'type' => $type,
                'value' => old($name),
            ]) !!} >

    </div>

    @error($name)
        <span class="text-danger-emphasis mt-1">*{{ $message }}</span>
    @enderror
</div>