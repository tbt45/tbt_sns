<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-5">
        {{ __('ユーザー情報を編集') }}
    </h2>
    <x-flash-message status="session('status')" />
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('users.update',['user' => $user->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="-m-2">
            <input type="hidden" value="{{ $user->id }}" name="id">
            {{-- 名前を変更 --}}
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <label for="name" class="leading-7 text-sm text-gray-600">ユーザーネーム</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <label for="body" class="leading-7 text-sm text-gray-600">自己紹介</label>
                    <input type="text" value="{{ $user->body }}" name="body" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>
            {{-- 画像を変更 --}}
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <div class="w-32">
                        <x-thumbnail :filename="$user->filename" type="users" />
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
            {{-- メールアドレスを変更 --}}
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                    <input type="email" id="email" value="{{ $user->email }}" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
            </div>

            <div class="p-2 w-full mt-4 flex justify-around">
                <input type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" value="更新する">
            </div>
        </div>
    </form>
</x-app-layout>