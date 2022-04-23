<?php

namespace App\Http\Controllers;

use App\models\User;
use App\models\Follower;

class FollowController extends Controller
{
    //フォロー
    public function follow(User $user, $id)
    {
        $user = User::find($id);
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }
    //フォロー解除
    public function unfollow(User $user, $id)
    {
        $user = User::find($id);
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) {
            // フォローしていなければフォロー解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
    //フォローしてるユーザーを表示する
    public function follows(string $name, Follower $follower)
    {
        $user = User::where('name', $name)->First();

        $follows = $user->follows->sortByDesc('created_at');
        //フォロー数を取得
        $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.follows', [
            'user' => $user,
            'follows' => $follows,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    //フォローされているユーザーを表示する
    public function followers(string $name, Follower $follower)
    {
        $user = User::where('name', $name)->First();

        $followers = $user->followers->sortByDesc('created_at');
        //フォロー数を取得
        $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
