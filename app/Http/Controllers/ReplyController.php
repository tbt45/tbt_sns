<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as RequestsArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Follower;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function create(Article $article, Reply $replies)
    {
        $articles = Article::all();

        return view('replies.create', [
            'replies' => $replies,
            'article' => $article,
            compact('articles')
        ]);
    }

    public function store(Article $article, RequestsArticleRequest $request)
    {
        Reply::create([
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();

        return redirect()->back();
    }

    //返信した記事を取得する
    public function show(string $name, Follower $follower, Article $article)
    {
        $user = User::where('name', $name)->first();

        $replies = $user->replies->sortByDesc('created_at');
        //フォロー数を取得
        $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.replies', [
            'user' => $user,
            'replies' => $replies,
            'article' => $article,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
}
