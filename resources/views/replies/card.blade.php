<div class='flex items-center justify-center bg-gradient-to-br border-solid border-2 border-gray-400 rounded-lg'>
    <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden sm:rounded-lg p-6 border-b border-gray-200">
        <a href="{{ route('replies.show', ['name' => $reply->user->name]) }}">
            <div class="h-15 w-16 border-2 border-white rounded-full pr-2">
                <x-thumbnail :filename="$reply->user->filename" type="users" />
            </div>   
        </a>
        <a href="{{ route('replies.show', ['name' => $reply->user->name]) }}">
            <div class="">
                {{ $reply->user->name }}
            </div>
        </a>
        <div>
            {{ $reply->created_at->format('Y/m/d H:i') }}
        </div>

        @if (Auth::id() === $reply->user_id)
            <div>
                <form method="post" action="{{ route('replies.destroy', ['reply' => $reply]) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
                </form>
            </div>
        @endif

        <a href="{{ route('replies.create', ['article' => $article]) }}">
            {{ $reply->body }}
        </a>
    </div>
</div>
