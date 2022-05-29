<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('フォローされているユーザー') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        @foreach ($followers as $user)
            @include('users.user')
        @endforeach
    </div>
</x-app-layout>