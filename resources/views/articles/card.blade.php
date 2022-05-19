<div class="py-12">
    <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
    {{-- <div class="p-2 w-1/2 mx-auto">
        <div class="relative">
            <x-thumbnail :filename="$article->user->filename" type="users" />
        </div>
    </div> --}}
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
            <i class="fas fa-user-circle fa-3x mr-1"></i>
        </a>
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
            <div class="">
                {{ $article->user->name }}
            </div>
        </a>
        <div>
            {{ $article->created_at->format('Y/m/d H:i') }}
        </div>

        @if (Auth::id() === $article->user_id)
            <div>
                <a href="{{ route('articles.edit', ['article' => $article]) }}">
                    編集
                </a>
                <form method="post" action="{{ route('articles.destroy', ['article' => $article]) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
                </form>
            </div>
        @endif

        {{-- <a href="{{ route('articles.show', ['article' => $article]) }}"> --}}
        <div>
            {{ $article->title }}
        </div>
        {{-- </a> --}}
        <div class="">
            {{ $article->body }}
        </div>

        {{-- いいねボタン --}}
        <div>
            @if ($article->is_liked_by_auth_user())
                <a href="{{ route('articles.unlike',['id'=>$article->id]) }}">
                いいね
                    <span>
                        {{ $article->likes->count() }}
                    </span>
                </a>
            @else
                <a href="{{ route('articles.like',['id'=>$article->id]) }}" class="text-red-800">
                    いいね
                <span>
                    {{ $article->likes->count() }}
                </span>
                </a>
            @endif
        </div>
        {{-- リツイートボタン --}}
        <div>
            @if ($article->is_retweeted_by_auth_user())
                <a href="{{ route('articles.unretweet',['id'=>$article->id]) }}">
                リツイート※
                    <span>
                        {{ $article->retweets->count() }}
                    </span>
                </a>
            @else
                <a href="{{ route('articles.retweet',['id'=>$article->id]) }}" class="text-red-800">
                    リツイート
                <span>
                    {{ $article->retweets->count() }}
                </span>
                </a>
            @endif
        </div>
        <div>
            <a href="{{ route('replies.create', ['article' => $article]) }}">返信する</a>
        </div>
    </div>
</div>
