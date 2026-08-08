@props(['value', 'optional' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if ($optional)
        <span class="text-gray-400 font-normal">({{ __('optional') }})</span>
    @endif
</label>
