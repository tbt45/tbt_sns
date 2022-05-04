<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事詳細') }}
        </h2>
    </x-slot>

    <div>
        @include('articles.card')
    </div>
    {{-- この記事に対する返信を全て表示する。 --}}

</x-app-layout>
