<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事投稿') }}
        </h2>
    </x-slot>

    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('articles.store') }}">
            @include('articles.form')
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">投稿する</button>
            </div>
        </form>
    </div>
</x-app-layout>
