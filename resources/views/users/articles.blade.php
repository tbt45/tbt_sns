{{-- ユーザー投稿といいねなど切り替え --}}
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('users.show',  ['name' => $user->name])" :active="request()->routeIs('users.show',  ['name' => $user->name])">
                        {{ __('投稿一覧') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- 返信機能をつけてから使用する --}}
                    <x-nav-link :href="route('users.show',  ['name' => $user->name])" :active="request()->routeIs('users.show',  ['name' => $user->name])">
                    {{-- <x-nav-link :href="route('articles.reply')" :active="request()->routeIs('articles.reply')"> --}}
                    {{ __('記事と返信(未実装)') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('users.likes',  ['name' => $user->name])" :active="request()->routeIs('users.likes',  ['name' => $user->name])">
                    {{ __('いいね') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div> 
</nav>