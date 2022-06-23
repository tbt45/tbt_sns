<div class='flex items-center justify-center bg-gradient-to-br border-solid border-2 border-gray-400 rounded-lg'>
    <article class="max-w-lg mx-auto break-inside p-6 rounded-xl bg-white flex flex-col bg-clip-border">
        <div class="flex items-center justify-between">
            <div class="flex h-25">
                <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
                    <div class="mb-8">
                    <div class="h-15 w-16 border-2 border-white rounded-full pr-2">
                        <x-thumbnail :filename="$article->user->filename" type="users" />
                    </div>
                    </div>
                </a>
                <div>
                    <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
                        {{ $article->user->name }}
                    </a>
                    <div class="">
                        {{ $article->created_at->format('Y/m/d H:i') }}
                    </div>
                </div>
            </div>
            <div class="">
                @if (Auth::id() === $article->user_id)
                <div class="mb-5">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <i class="fa-solid fa-ellipsis fa-2x"></i>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <form method="GET" action="{{ route('articles.edit', ['article' => $article]) }}">
                                @csrf
                                <x-dropdown-link :href="route('articles.edit', ['article' => $article])" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('編集') }}
                                </x-dropdown-link>
                            </form>
                            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                @method('DELETE')
                                @csrf
                                <x-dropdown-link :href="route('articles.destroy', ['article' => $article])" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    {{ __('削除') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif
            </div>
        </div>

        <div class="py-4">
            <div class="flex justify-between gap-1 mb-1">
                <a class="flex" href="#">
                    <img class="max-w-full rounded-br-lg" src="{{ asset("images/no_image.jpg") }}">
                </a>
                <a class="flex" href="#">
                    <img class="max-w-full rounded-br-lg" src="{{ asset("images/no_image.jpg") }}">
                </a>
            </div>
            <div class="flex justify-between gap-1">
                <a class="flex" href="#">
                    <img class="max-w-full rounded-br-lg" src="{{ asset("images/no_image.jpg") }}">
                </a>
                <a class="flex" href="#">
                    <img class="max-w-full rounded-br-lg" src="{{ asset("images/no_image.jpg") }}">
                </a>
            </div>
        </div>
        <div class="">
            {{ $article->body }}
        </div>

        {{-- いいねボタン --}}
        <div class="flex">
            @if ($article->is_liked_by_auth_user())
            <a href="{{ route('articles.unlike',['id'=>$article->id]) }}">
                <i class="fa-solid fa-heart text-red-700"></i>
                <span class="mr-2">
                    {{ $article->likes->count() }}
                </span>
            </a>
            @else
            <a href="{{ route('articles.like',['id'=>$article->id]) }}">
                <i class="fa-solid fa-heart"></i>
                <span class="mr-2">
                    {{ $article->likes->count() }}
                </span>
            </a>
            @endif
            {{-- </div> --}}

            {{-- リツイートボタン --}}
            {{-- <div class="flex"> --}}
            @if ($article->is_retweeted_by_auth_user())
            <a href="{{ route('articles.unretweet',['id'=>$article->id]) }}">
                <i class="fa-solid fa-retweet text-blue-700"></i>
                <span>
                    {{ $article->retweets->count() }}
                </span>
            </a>
            @else
            <a href="{{ route('articles.retweet',['id'=>$article->id]) }}">
                <i class="fa-solid fa-retweet"></i>
                <span>
                    {{ $article->retweets->count() }}
                </span>
            </a>
            @endif
        </div>

        {{-- 返信する --}}
        <div>
            <a href="{{ route('replies.create', ['article' => $article]) }}">返信する</a>
        </div>
    </article>
</div>