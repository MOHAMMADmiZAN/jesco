<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="alert alert-success">
        <h1 wire:poll.100ms>{{now()->format('g:i:s:a')}}</h1>

    </div>

</x-app-layout>
