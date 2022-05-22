<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('タイムライン') }}
    </h2>
    @foreach ($articles as $article)
    @include('articles.card')
    @endforeach
</x-app-layout>