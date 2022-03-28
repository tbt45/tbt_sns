<div class="py-12">
  <div
    class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
    <i class="fas fa-user-circle fa-3x mr-1"></i>
    <div class="">
      {{ $article->user->name }}
    </div>
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

    <a href="{{ route('articles.show', ['article' => $article]) }}">
      {{ $article->title }}
    </a>
    <div class="">
      {{ $article->body }}
    </div>
  </div>
</div>
