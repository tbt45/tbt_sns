<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タイムライン') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
</x-app-layout>