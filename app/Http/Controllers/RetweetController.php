<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Models\Follower;
use App\Models\Retweet;
use Illuminate\Support\Facades\Auth;

class RetweetController extends Controller
{
    //リツイートした記事を取得する
    // public function retweets(string $name, Follower $follower)
    // {
    //     $user = User::where('name', $name)->first();

    //     $articles = $user->likes->sortByDesc('created_at');
    //     //フォロー数を取得
    //     $follow_count = $follower->getFollowCount($user->id);
    //     // フォロワー数を取得
    //     $follower_count = $follower->getFollowerCount($user->id);

    //     return view('users.likes', [
    //         'user' => $user,
    //         'articles' => $articles,
    //         'follow_count' => $follow_count,
    //         'follower_count' => $follower_count
    //     ]);
    // }
    // リツイート機能
    public function retweet($id)
    {
        Retweet::create([
            'article_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    // リツイート解除
    public function unretweet($id)
    {
        $like = Retweet::where('article_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
}
