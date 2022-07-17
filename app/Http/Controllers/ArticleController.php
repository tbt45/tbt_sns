<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest as RequestsArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(RequestsArticleRequest $request, Article $article)
    {
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'articles');
        }

        $article = new Article();
        $article->user_id = $request->user()->id;
        $article->body = $request->body;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $article->filename = $fileNameToStore;
        }
        $article->save();

        return redirect()->route('articles.timeline');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function  update(RequestsArticleRequest $request, Article $article)
    {
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'articles');
        }

        $article->body = $request->body;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $article->filename = $fileNameToStore;
        }

        $article->save();

        return redirect()->route('articles.timeline');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.timeline');
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
        $like = Like::where('article_id', $id)
        ->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
    //フォローしたユーザーと自分の投稿のみ表示する
    public function timeline()
    {
        $articles = Article::query()
            ->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))
            ->orWhere('user_id', Auth::user()->id)->latest()->get();
        // ->paginate(10);

        return view('articles.timeline')->with([
            'articles' => $articles
        ]);
    }
}
