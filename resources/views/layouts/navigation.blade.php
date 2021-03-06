<nav x-data="{ open: false }">
    <div class="bg-purple-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <div class="shrink-0 flex items-center w-20">
                        <a href="{{ route('articles.timeline') }}">
                            <x-application-logo />
                        </a>
                    </div>
                </div>

                <div class="flex items-center justify-end md:flex-1 lg:w-0">
                    <div class="flex">
                        <div class="flex pr-4">
                            <x-nav-link :href="route('articles.timeline')" :active="request()->routeIs('articles.timeline')">
                                <i class="fas fa-home fa-2x"></i>
                            </x-nav-link>
                        </div>
                        <div class="flex pr-4">
                            <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                                <i class="fas fa-globe-americas fa-2x"></i>
                            </x-nav-link>
                        </div>
                        <div class="flex pr-4">
                            <x-nav-link :href="route('articles.create')" :active="request()->routeIs('articles.create')">
                                <i class="fas fa-pen fa-2x"></i>
                            </x-nav-link>
                        </div>

                        <div class="flex">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <i class="fas fa-user fa-2x"></i>
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
                                            {{ __('???????????????') }}
                                        </x-dropdown-link>
                                    </form>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            {{ __('???????????????') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>