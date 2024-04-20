@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border form-control   rounded shadow']) !!}>
