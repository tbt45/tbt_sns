<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('ユーザー情報') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <a href="{{ route('users.show',['name'=>$user->name]) }}">
      <i class="fas fa-user-circle fa-3x"></i>
    </a>
    <h2>
      <a href="{{ route('users.show',['name'=>$user->name]) }}">
        {{ $user->name }}
      </a>
    </h2>
    <a href="">10フォロー</a>
    <a href="">10フォロワー</a>
  </div>  
</x-app-layout>
