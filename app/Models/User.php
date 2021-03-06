<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'filename',
        'body'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //ユーザーがした投稿
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }
    //いいねした記事
    public function likes()
    {
        return $this->belongsToMany('App\Models\Article', 'likes')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }
    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }

    // フォロー
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }
    // フォロー解除
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }
    // フォローしているか
    public function isFollowing($user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->exists();
    }
    // フォローされているか
    public function isFollowed($user_id)
    {
        return (bool) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
