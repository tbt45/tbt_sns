<?php

namespace App\Http\Controllers;

use App\models\User;

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
}
