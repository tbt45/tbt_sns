<div class="py-12">
    <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
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
                <a href="{{ route('replies.edit', ['reply' => $reply]) }}">
                    編集
                </a>
                <form method="post" action="{{ route('replies.destroy', ['reply' => $reply]) }}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
                </form>
            </div>
        @endif

        <a href="{{ route('replies.show', ['name' => $user->name]) }}">
            {{ $reply->body }}
        </a>
    </div>
</div>
