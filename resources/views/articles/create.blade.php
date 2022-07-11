<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5 mx-auto">
        {{ __('投稿する') }}
    </h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @include('articles.form')
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <div class="w-32">
                        <label for="image"></label>
                        <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">投稿する</button>
            </div>
        </form>
    </div>
</x-app-layout>