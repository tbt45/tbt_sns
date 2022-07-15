<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('記事詳細') }}
        </h2>
    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('記事詳細') }}
    </h2>
    <div>
        @include('articles.card')
    </div>
    {{-- この記事に対する返信を全て表示する。 --}}
    <div class="py-12">
        <div>返信一覧</div>
        @foreach ($article->replies as $reply)
        @include('replies.card')
        @endforeach
        {{-- 返信する --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
            <form method="POST" action="{{ route('replies.store') }}">
                @csrf
                <div class="py-12">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <div class=" bg-white rounded-md max-w-2xl mx-auto">
                        <div>返信する</div>
                        <div class="space-y-4">
                            <textarea required name="body" cols="30" rows="10" placeholder="本文" class="w-full text-gray-600 outline-none rounded-md"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-around">
                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">返信する</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>