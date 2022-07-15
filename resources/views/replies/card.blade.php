<div class='bg-gradient-to-br border-solid border-2 border-gray-400 rounded-lg'>
    <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden sm:rounded-lg p-6 border-b border-gray-200">
        <div class="flex justify-between">
            <div class="flex">
                <a href="{{ route('users.show', ['name' => $reply->user->name]) }}">
                    <div class="h-15 w-16 border-2 border-white rounded-full pr-2">
                        <x-thumbnail :filename="$reply->user->filename" type="users" />
                    </div>   
                </a>
                <div>
                <a href="{{ route('users.show', ['name' => $reply->user->name]) }}">
                    {{ $reply->user->name }}
                </a>
                <div>
                    {{ $reply->created_at->format('Y/m/d H:i') }}
                </div>
            </div>
            </div>
            @if (Auth::id() === $reply->user_id)
                    <form method="post" action="{{ route('replies.destroy', ['reply' => $reply]) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
                    </form>
            @endif
        </div>
        <a href="{{ route('replies.create', ['article' => $reply->article]) }}">
            {{ $reply->body }}
        </a>
    </div>
</div>
