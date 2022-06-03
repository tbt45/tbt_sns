<x-guest-layout>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('login') }}" class="max-w-sm m-4 p-10 bg-white bg-opacity-25 rounded shadow-xl">
                        @csrf
                        <div class="w-20 mx-auto">
                            <a href="/">
                                <x-application-logo />
                            </a>
                        </div>
                        <div class="">
                            <label class="block text-sm text-white" for="email">メールアドレス</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" id="email" name="email" placeholder="メールアドレス" required autofocus>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block  text-sm text-white">パスワード</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" name="password" type="password" id="password" placeholder="パスワード" autocomplete="current-password" required>
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('自動ログイン') }}</span>
                            </label>
                        </div>
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded" type="submit">ログイン</button>
                        <div class="mt-4 items-center flex justify-between">
                            @if (Route::has('password.request'))
                            <a class="inline-block right-0 align-baseline font-bold text-sm text-500 text-white hover:text-red-400" href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
                            @endif
                        </div>
                        <div class="text-center">
                            <a href="{{ route('register') }}" class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-red-400">
                                アカウントを作成する
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .login {

            background: url('images/bg-image.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</x-guest-layout>