@props([
    'type' => 'button',
    'color' => 'primary',
    'size' => 'md',
    'outline' => false,
    'block' => false,
    'disabled' => false,
    'href' => false,
    'target' => false,
    'icon' => false,
    'icon-side' => 'left',
    'icon-color' => 'primary',
])

@php
    $classes = 'btn';
    $classes .= $outline ? '' : ' btn-' . $color;
    $classes .= ' btn-' . $size;
    $classes .= $outline ? ' btn-outline-' . $color : '';
    $classes .= $block ? ' btn-block' : '';
    $classes .= $icon ? ' btn-icon-' . $iconSide : '';
    $classes .= $disabled ? ' disabled' : '';
    $classes .= $icon ? ' btn-icon-' . $iconColor : '';
@endphp

@if ($href)
    <a href="{{ $href }}" target="{{ $target }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif

        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} {{ $disabled ? 'disabled' : '' }}>

        @if ($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif

        @if($type == 'submit')
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        @endif

        <span class="btn-text d-block">{{ $slot }}</span>
    </button>
@endif

@push('custom-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn[type="submit"]');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const spinner = this.querySelector('.spinner-border');
                    const btnText = this.querySelector('.btn-text');

                    spinner.classList.remove('d-none');
                    btnText.classList.add('d-none');
                    button.classList.add('disabled');

                    if (!document.getElementById('form').checkValidity()) {
                        spinner.classList.add('d-none');
                        btnText.classList.remove('d-none');
                        button.classList.remove('disabled');
                    }
                });
            });
        });
    </script>
@endpush
