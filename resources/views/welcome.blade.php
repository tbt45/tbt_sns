<x-guest-layout>
    <div class="flex items-center justify-center h-screen bg-purple-200">
        <div class="bg-white rounded-2xl border shadow-x1 p-10 max-w-lg w-2/3">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-20 mx-auto">
                    <a href="/">
                        <x-application-logo />
                    </a>
                </div>
                <h1 class="font-bold text-2xl text-gray-700 text-center">
                    tbt_snsへようこそ
                </h1>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-red-400">
                        ログインはこちら
                    </a>
                </div>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-red-400">
                        アカウントを作成する
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>