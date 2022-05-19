<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Tailblocks</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:text-gray-900">First Link</a>
        <a class="mr-5 hover:text-gray-900">Second Link</a>
        <a class="mr-5 hover:text-gray-900">Third Link</a>
        <a class="mr-5 hover:text-gray-900">Fourth Link</a>
      </nav>
      <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
  </header>
  

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex h-20">
            <div class="shrink-0 flex items-center">
                <div class="w-12">
                    <a href="{{ route('articles.timeline') }}">
                        <x-application-logo />
                    </a>
                </div>
            </div>
            <div class="justify-end flex">
            <!-- Logo -->
                <!-- Navigation Links -->
                <div class="space-x-8 -my-px ml-10 flex">
                    <x-nav-link :href="route('articles.timeline')" :active="request()->routeIs('articles.timeline')">
                        {{-- {{ __('タイムライン') }} --}}
                        <i class="fas fa-home"></i>
                    </x-nav-link>
                </div>
                <div class="space-x-8 -my-px ml-10 flex">
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                        <i class="fas fa-globe-americas"></i>
                        {{-- {{ __('記事一覧') }} --}}
                    </x-nav-link>
                </div>
                <div class="space-x-8 -my-px ml-10 flex">
                    <x-nav-link :href="route('articles.create')" :active="request()->routeIs('articles.create')">
                        {{-- {{ __('投稿する') }} --}}
                        <i class="fas fa-pen mr-1"></i>
                    </x-nav-link>
                </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <i class="fas fa-user"></i>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
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
    </div>
    </div>

            <!-- Hamburger -->
            {{-- <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    {{-- </button> --}}

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('users.show', ['name' => Auth::user()->name]) }}">
                    @csrf
                    <x-dropdown-link :href="route('users.show', ['name' => Auth::user()->name])" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('マイページ') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-2 pb-3 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

