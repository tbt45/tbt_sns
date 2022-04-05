<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザー情報') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <x-thumbnail :filename="$user->profile_image" />
                    </div>
                </div>
            </a>
            <h2>
                <a href="{{ route('users.show', ['name' => $user->name]) }}">
                    {{ $user->name }}
                </a>
            </h2>
            <div>{{ $user->body }}</div>
            <a href="">10フォロー</a>
            <a href="">10フォロワー</a>
            @if (Auth::id() === $user->id)
            <div>
                <a href="{{ route('users.edit', ['user' => $user]) }}">
                    編集
                </a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
