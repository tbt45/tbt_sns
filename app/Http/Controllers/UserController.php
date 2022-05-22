<?php

namespace App\Http\Controllers;

use App\models\User;
use App\models\Follower;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use InterventionImage;



class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(string $name, Follower $follower)
    {
        $user = User::where('name', $name)->first();
        //ユーザーの投稿を取得
        $articles = $user->articles->sortByDesc('created_at');
        //フォロー数を取得
        $follow_count = $follower->getFollowCount($user->id);
        // フォロワー数を取得
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }
    // ユーザー情報を編集する。
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // return view('users.edit', ['user' => $user]);
        return view('users.edit', compact('user'));
    }

    // ユーザー情報を更新する。
    public function  update(UploadImageRequest $request, $id)
    {
        $request->validate(['name' => ['required', 'string', 'max:255']]);

        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'users');
        }
        // $user->fill($request->all())->save();
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->body = $request->body;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $user->filename = $fileNameToStore;
            // $fileNameToStore = ImageService::upload($imageFile, 'users');
        }

        $user->save();

        return redirect()
            ->route('users.show', ['name' => $user->name])
            ->with([
                'message' => 'ユーザー情報を更新しました。',
                'status' => 'info'
            ]);
    }
}
