<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('編集する') }}
    </h2>
    <div>
        @include('articles.card')
    </div>
    {{-- この記事に対する返信を全て表示する。 --}}
    </div>
</x-app-layout>