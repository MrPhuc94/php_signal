{{-- blade-formatter-disable --}}
@component('mail::message')

{!! $content !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

{{-- blade-formatter-disable --}}
