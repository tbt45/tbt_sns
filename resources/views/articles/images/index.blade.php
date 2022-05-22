<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('画像投稿') }}
        </h2>
    </x-slot>

    <div
        class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <div class="flex justify-end mb-4">
            <button onclick="location.href='{{ route('images.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
        </div>
        <div class="flex flex-wrap">
            @foreach ($images as $image)
                <div class="w-1/4 p-2 md:p-4">
                    <a href="{{ route('images.edit',['imag' => $image->id]) }}">
                        <div class="border rounded-md p-2 md:p-4">
                            <x-thumbnail :filename="$image->filename" type="articles" />
                            <div class="text-gray-700">{{ $image->title }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $image->links() }}
        {{-- <form method="POST" action="{{ route('images.store') }}"> --}}
            {{-- @include('articles.form') --}}
            {{-- <div class="p-2 w-1/2 mx-auto">
                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                <input type="file" id="image" name="file[][image]" multiple accept="image/pmg,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="p-2 w-full mt-4 flex justify-around">
                <button type="button" onclick="location.href='{{ route('images.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
            </div> --}}
            {{-- <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                <button type="submit">登録する</button>
            </div> --}}
        {{-- </form> --}}
    </div>
</x-app-layout>
