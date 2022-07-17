<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Models\Follower;
use App\Models\Article;
use App\Models\Like;


class LikeController extends Controller
{
    //いいねした記事を取得する
    public function likes(string $name, Follower $follower)
    {
        $user = User::where('name', $name)->first();
        $article = Article::get();
        // $likes = Like::where('user_id',$user->id)->get();
        $articles = $user->likes->sortByDesc('created_at');
        // $articles = Article::
        // where('id',$likes->article_id)
        // ->orderBy('created_at','DESC')->paginate(10);

        // dd($user,$likes,$articles);

        //フォロー数を取得
        $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
