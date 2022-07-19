<x-guest-layout>
    <div class="flex items-center justify-center h-screen bg-purple-200">
        <div class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg">
            <div class="flex flex-col items-center space-y-4">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @csrf
                    <div class="w-20 mx-auto">
                        <a href="/">
                            <x-application-logo />
                        </a>
                    </div>
                    <div class="">
                        <label class="block text-sm" for="name">名前</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="text" id="name" placeholder="名前" required autofocus name="name">
                    </div>
                    <div class="">
                        <label class="block text-sm" for="email">メールアドレス</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" name="email" id="email" placeholder="メールアドレス" required>
                    </div>
                    <div class="mt-2">
                        <label for="password" class="block  text-sm">パスワード</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" name="password" type="password" id="password" placeholder="パスワード" arial-label="password" required>
                    </div>
                    <div class="mt-2">
                        <label for="password_confirmation" class="block  text-sm">パスワード確認</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" name="password_confirmation" type="password" id="password_confirmation" placeholder="パスワード確認" required>
                    </div>
                    <div class="mt-4 items-center flex justify-between">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded" type="submit">アカウント作成</button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-red-400">
                            ログインはこちら
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>