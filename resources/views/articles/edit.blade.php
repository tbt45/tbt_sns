<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('編集する') }}
    </h2>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}" enctype="multipart/form-data">
            @method('PATCH')
            @include('articles.form')
            {{-- 画像を変更 --}}
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <div class="w-32">
                        <x-thumbnail :filename="$article->filename" type="articles" />
                    </div>
                </div>
            </div>
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <div class="w-32">
                        <label for="image"></label>
                        <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">
                    </div>
                </div>
            </div>
            <div class="p-2 w-full mt-4 flex justify-around">
                <input type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" value="更新する">
            </div>
        </form>
    </div>
</x-app-layout>