<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('画像投稿') }}
        </h2>
    </x-slot>

    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('images.update',['image' => $image->id]) }}">
            {{-- @include('articles.form') --}}
            <div class="p-2 w-1/2 mx-auto">
                <label for="title" class="leading-7 text-sm text-gray-600">画像</label>
                <input type="text" id="title" name="title" value="{{ $image->title }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <div class="w-32">
                        <x-thumbnail :filename="$image->filename" type="articles" />
                    </div>
                </div>
            </div>
            <div class="p-2 w-full mt-4 flex justify-around">
                <button type="button" onclick="location.href='{{ route('images.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
            </div>
        </form>
        <form id="delete_{{ $image->id }}" method="POST" action="{{ route('images.destroy',['image' => $image->id]) }}">
            <div class="p-2 w-full mt-32 flex justify-around">
                <a href="#" data-id="{{ $image->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除する</a>
            </div>
        </form>
    </div>
    <script>
        function deletePost(e){
            'use strict';
            if(confirm('本当に削除してもいいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
