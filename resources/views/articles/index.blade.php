<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事一覧') }}
        </h2>
    </x-slot>

    {{-- @section('content') --}}
    <div class="py-12">
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
    {{-- @endsection --}}
</x-app-layout>
