<x-mail::message>
    # Introduction
    {{$email}}
    <br>
    {{$msg}}
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>