    <div class="lg:w-1/4 bg-white pt-8">
        <div class="mb-5">
            <x-nav-link :href="route('articles.timeline')" :active="request()->routeIs('articles.timeline')">
                <i class="fas fa-home fa-2x hidden md:block"> タイムライン</i>
                <i class="fas fa-home fa-2x md:hidden"> </i>
            </x-nav-link>
        </div>
        <div class="mb-5">
            <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                <i class="fas fa-globe-americas fa-2x hidden md:block"> 全ての記事</i>
                <i class="fas fa-globe-americas fa-2x md:hidden"></i>
            </x-nav-link>
        </div>
        <div class="mb-5">
            <x-nav-link :href="route('articles.create')" :active="request()->routeIs('articles.create')">
                <i class="fas fa-pen fa-2x hidden md:block"> 投稿する</i>
                <i class="fas fa-pen fa-2x md:hidden"></i>
            </x-nav-link>
        </div>

        <div class="mb-5">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <i class="fas fa-user fa-2x hidden md:block"> ユーザー情報</i>
                        <i class="fas fa-user fa-2x md:hidden"></i>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <form method="POST" action="{{ route('users.show', ['name' => Auth::user()->name]) }}">
                        @csrf
                        <x-dropdown-link :href="route('users.show', ['name' => Auth::user()->name])" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('マイページ') }}
                        </x-dropdown-link>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>