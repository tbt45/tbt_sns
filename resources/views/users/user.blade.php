<a href="{{ route('users.show', ['name' => $user->name]) }}">
    <div class="p-2 w-1/2 mx-auto">
        <div class="relative">
            <x-thumbnail :filename="$user->profile_image" />
        </div>
    </div>
</a>
<h2>
    <a href="{{ route('users.show', ['name' => $user->name]) }}">
        {{ $user->name }}
    </a>
</h2>
<div>{{ $user->body }}</div>
{{-- フォローされている場合に表示 --}}
@if ($user->isFollowed($user->id))
    <div>フォローされています</div>
@endif
{{-- 他のユーザーの場合にフォローボタンを表示 --}}
@if (Auth::id()!==$user->id)    
{{-- フォロー解除ボタン --}}
@if (auth()->user()->isFollowing($user->id))
<form action="{{ route('users.unfollow', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">フォロー解除</button>
</form>
@else
{{-- フォローボタン --}}
<form action="{{ route('users.follow', ['id' => $user->id]) }}" method="POST">
    @csrf
    
    <button type="submit">フォローする</button>
</form>
@endif
@endif
{{-- フォロー数を表示 --}}
<a href="{{ route('users.follows', ['name' => $user->name]) }}">
    フォロー　{{ $follow_count }}
</a>
{{-- フォロワー数を表示 --}}
<a href="{{ route('users.followers', ['name' => $user->name]) }}">
    フォロワー　{{ $follower_count }}
</a>