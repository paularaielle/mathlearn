@php
    $home = isset($home) ? $home : null;
    $startLabel = isset($startLabel) ? $startLabel : null;
    $endLabel = isset($endLabel) ? $endLabel : null;
@endphp

<nav aria-label="breadcrumb float-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Principal</a>
        </li>

        @if ($home)
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route($home) }}">{{ $startLabel }}</a>
            </li>
        @endif

        @if ($endLabel)
            <li class="breadcrumb-item active" aria-current="page">
                {{ $endLabel }}
            </li>
        @endif
    </ol>
</nav>