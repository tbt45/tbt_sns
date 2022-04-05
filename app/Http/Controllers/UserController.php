<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest as RequestsUserRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.show', ['user' => $user]);
    }

    // ユーザー情報を編集する。
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    // ユーザー情報を更新する。
    public function  update(Request $request, User $user)
    {
        $request->validate(['name' => ['required', 'string', 'max:255']]);

        $user->fill($request->all())->save();

        return redirect()->route('users.show', ['name' => $user->name])
            ->with([
                'message' => 'ユーザー情報を更新しました。',
                'status' => 'info'
            ]);
    }
}
