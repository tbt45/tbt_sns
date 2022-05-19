<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事編集') }}
        </h2>
    </x-slot>

    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
            @method('PATCH')
            @include('articles.form')
            {{-- <x-select-image :images="$images" currentId="{{$article->image1}}" currentImage="{{$article->imageFirst->filename ?? ''}}" name="image1" />
            <x-select-image :images="$images" currentId="{{$article->image2}}" currentImage="{{$article->imageSecond->filename ?? ''}}" name="image2" />
            <x-select-image :images="$images" currentId="{{$article->image3}}" currentImage="{{$article->imageThird->filename ?? ''}}" name="image3" />
            <x-select-image :images="$images" currentId="{{$article->image4}}" currentImage="{{$article->imageFourth->filename ?? ''}}" name="image4" /> --}}
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">更新する</button>
            </div>
        </form>
    </div>
</x-app-layout>
