<div class='flex flex-col items-center justify-center border-solid border-2 border-gray-400 rounded-lg'>
    <div class='user-list w-full max-w-lg mx-auto bg-white rounded-xl shadow-xl flex flex-col'>
        <div class="user-row flex flex-col items-center justify-between p-4 duration-300 sm:flex-row sm:py-4 sm:px-8">
            <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-2.5">
                    {{-- <x-thumbnail :filename="$user->filename" type="users" /> --}}
                    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="cursor-pointer  hover:bg-[#f6f8f9]">
                        <i class="fas fa-user-circle fa-3x mr-1"></i>
                    </a>
                </div>
                <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4">
                    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="title font-medium no-underline cursor-pointer  hover:bg-[#f6f8f9]">
                        {{ $user->name }}
                    </a>
                    {{-- フォローされている場合に表示 --}}
                    @if ($user->isFollowed($user->id))
                    <div>フォローされています</div>
                    @endif
                    <div class="skills flex flex-col">
                        {{-- フォロー数を表示 --}}
                        <span class="subtitle text-slate-500 cursor-pointer  hover:bg-[#f6f8f9]">
                            <a href="{{ route('users.follows', ['name' => $user->name]) }}">
                                フォロー {{ $follow_count }}
                            </a>
                        </span>
                        {{-- フォロワー数を表示 --}}
                        <span class="subtitle text-slate-500 cursor-pointer  hover:bg-[#f6f8f9]">
                            <a href="{{ route('users.followers', ['name' => $user->name]) }}">
                                フォロワー {{ $follower_count }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            {{-- 他のユーザーの場合にフォローボタンを表示 --}}
            @if (Auth::id()!==$user->id)
            {{-- フォロー解除ボタン --}}
            @if (auth()->user()->isFollowing($user->id))
            <form action="{{ route('users.unfollow', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    <button class="btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-4 py-1.5 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-[#6911e7] hover:bg-[#590acb] duration-300" type="submit">フォロー解除</button>
                </div>
            </form>
            @else
            {{-- フォローボタン --}}
            <form action="{{ route('users.follow', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                    <button class="btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-4 py-1.5 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-[#6911e7] hover:bg-[#590acb] duration-300" type="submit">フォローする</button>
                </div>
            </form>
            @endif
            @endif
        </div>
        <div class="show-more block w-10/12 mx-auto py-2.5 px-4 text-center no-underline rounded font-medium duration-300">{{ $user->body }}</div>
    </div>
</div>