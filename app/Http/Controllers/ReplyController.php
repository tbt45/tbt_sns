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
    // public function index()
    // {
    //     $articles = Article::all()->sortByDesc('created_at');

    //     return view('articles.index', ['articles' => $articles]);
    // }

    public function create(Article $article, Reply $replies)
    {
        // $user = User::where('name', $name)->first();
        // $article = Article::where('id', $reply->article_id)->first();
        // $replies = Reply::where('id', $id)->sortByDesc('created_at');

        // $replies = $article->replies->sortByDesc('created_at');
        //フォロー数を取得
        // $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        // $follower_count = $follower->getFollowerCount($user->id);

        return view('replies.create', [
            // 'user' => $user,
            'replies' => $replies,
            // 'follow_count' => $follow_count,
            // 'follower_count' => $follower_count,
            'article' => $article,
        ]);
    }

    public function store(RequestsArticleRequest $request)
    {
        Reply::create([
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('articles.timeline');
    }

    public function edit(Reply $reply)
    {
        return view('replies.edit', ['reply' => $reply]);
    }

    public function  update(RequestsArticleRequest $request, Reply $reply)
    {
        $reply->fill($request->all())->save();

        return redirect()->route('articles.timeline');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();

        return redirect()->back();
    }

    //返信した記事を取得する
    public function show(string $name, Follower $follower)
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
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    public function sho(Reply $reply)
    {
        return view('articles.show', ['reply' => $reply]);
    }
}
