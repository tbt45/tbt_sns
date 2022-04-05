<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as RequestsArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(RequestsArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function  update(RequestsArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    // ログインしていない人に見えるようにする
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    // いいね機能
    public function like($id)
    {
        Like::create([
            'article_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    // いいね解除
    public function unlike($id)
    {
        $like = Like::where('article_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
}
