<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事詳細') }}
        </h2>
    </x-slot>

    <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        @include('articles.card')
    </div>
    {{-- この記事に対する返信を全て表示する。 --}}
    <div>返信一覧</div>
    <div class="py-12">
        @foreach ($article->replies as $reply)
            @include('replies.card')
        @endforeach
    </div>

    {{-- 返信する --}}
    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('replies.store') }}">
            @csrf
            <div class="py-12">
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <div class=" bg-white rounded-md max-w-2xl mx-auto">
                    <div class="space-y-4">
                        <textarea required name="body" cols="30" rows="10" placeholder="本文" class="w-full text-gray-600 outline-none rounded-md"></textarea>
                    </div>
                </div>
            </div>
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">返信する</button>
            </div>
        </form>
    </div>
</x-app-layout>
