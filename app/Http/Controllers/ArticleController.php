<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as RequestsArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $images = Image::where('user_id', Auth::id())
            ->select('id', 'filename')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view(
            'articles.create',
            compact('images')
        );
    }

    public function store(RequestsArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        // 'image1' => $request->image1,
        // 'image1' => $request->image2,
        // 'image1' => $request->image3,
        // 'image1' => $request->image4,
        $article->save();

        return redirect()->route('articles.timeline');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function  update(RequestsArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        return redirect()->route('articles.timeline');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
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
    //フォローしたユーザーと自分の投稿のみ表示する
    public function timeline()
    {
        $articles = Article::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
        return view('articles.timeline')->with([
            'articles' => $articles
        ]);
    }
}
