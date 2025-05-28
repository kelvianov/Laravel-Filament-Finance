<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')" style="background-color:#1a202c; color:#fff; font-weight:bold; font-size:1.5rem; padding: 20px 0;">
    {{ config('app.name') }}
</x-mail::header>
</x-slot:header>

{{-- Body --}}
<div style="font-family: Arial, sans-serif; font-size: 16px; color: #2d3748; line-height: 1.6; padding: 20px;">
    {!! $slot !!}
</div>

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
    <x-mail::subcopy style="font-size: 13px; color: #718096; padding-top: 15px; border-top: 1px solid #e2e8f0;">
        {!! $subcopy !!}
    </x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
    <x-mail::footer style="font-size: 13px; color: #a0aec0; padding: 20px 0; border-top: 1px solid #e2e8f0; text-align: center;">
        © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
    </x-mail::footer>
</x-slot:footer>
</x-mail::layout>
