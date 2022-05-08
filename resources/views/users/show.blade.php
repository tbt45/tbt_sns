<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザー情報') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <x-flash-message status="session('status')" />
            @include('users.user')
            @if (Auth::id() === $user->id)
            <div>
                <a href="{{ route('users.edit', ['user' => $user]) }}">
                    編集
                </a>
            </div>
            @endif
        </div>
        @include('users.articles')
        @foreach ($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
    
</x-app-layout>
