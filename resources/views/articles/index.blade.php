<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('全ての記事') }}
    </h2>
    @foreach ($articles as $article)
    @include('articles.card')
    @endforeach
    {{ $articles->links() }}
</x-app-layout>