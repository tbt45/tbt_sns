<x-guest-layout>
    <div class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form method="POST" action="{{ route('register') }}" class="max-w-sm m-4 p-10 bg-white bg-opacity-25 rounded shadow-xl">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @csrf
                        <div class="w-20 mx-auto">
                            <a href="/">
                                <x-application-logo />
                            </a>
                        </div>
                        <div class="">
                            <label class="block text-sm text-white" for="name">名前</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="text" id="name" placeholder="名前" required autofocus name="name">
                        </div>
                        <div class="">
                            <label class="block text-sm text-white" for="email">メールアドレス</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" name="email" id="email" placeholder="メールアドレス" required>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block  text-sm text-white">パスワード</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" name="password" type="password" id="password" placeholder="パスワード" arial-label="password" required>
                        </div>
                        <div class="mt-2">
                            <label for="password_confirmation" class="block  text-sm text-white">パスワード確認</label>
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
    </div>
    <style>
        .login {

            background: url('images/bg-image.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</x-guest-layout>