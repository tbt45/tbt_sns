<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Services\ImageService;
use App\http\Requests\UploadImageRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ImageController extends Controller
{

    public function index()
    {
        $images = Image::where('user_id', Auth::id())
            ->orderBy('update_at', 'desc')
            ->paginate(20);

        return view('articles.images.index');
    }
    public function create()
    {
        return view('articles.images.create');
    }
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if (!is_null($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore = ImageService::upload($imageFile, 'articles');
                Image::create([
                    'user_id' => Auth::id(),
                    'filename' => $fileNameToStore
                ]);
            }
        }

        return redirect()
            ->route('articles.images.index')
            ->with([
                'message' => '画像登録を実施しました。',
                'status' => 'info'
            ]);
    }
    public function edit($id)
    {
        $image = Image::findOrFile($id);

        return view('articles.images.edit');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:50',
        ]);

        $image = Image::findOrFile($id);
        $image->title = $request->title;

        $image->save();

        return redirect()
            ->route('articles.images.index')
            ->with([
                'message' => '画像情報を更新しました。',
                'status' => 'info'
            ]);
    }
    public function destroy($id)
    {
        $image = Image::findOrFile($id);
        $filePath = 'public/articles/' . $image->filename;

        $imageInArticles = Article::where('image1', $image->id)
            ->orWhere('image2', $image->id)
            ->orWhere('image3', $image->id)
            ->orWhere('image4', $image->id)
            ->get();

        if ($imageInArticles) {
            $imageInArticles->each(function ($article) use ($image) {
                if ($article->image1 === $image->id) {
                    $article->image1 = null;
                    $article->save();
                }
                if ($article->image2 === $image->id) {
                    $article->image2 = null;
                    $article->save();
                }
                if ($article->image3 === $image->id) {
                    $article->image3 = null;
                    $article->save();
                }
                if ($article->image4 === $image->id) {
                    $article->image4 = null;
                    $article->save();
                }
            });
        }

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        Image::findOrFile($id)->delete();

        return redirect('articles.images.index')
            ->with([
                'message' => '画像を削除しました。',
                'status' => 'alert'
            ]);
    }
}
