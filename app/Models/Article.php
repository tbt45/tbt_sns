<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'filename',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class, 'App\Models\Reply');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'article_id');
    }
    public function retweets()
    {
        return $this->hasMany(Retweet::class, 'article_id');
    }
    // いいね機能
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
    // リツイート機能
    public function is_retweeted_by_auth_user()
    {
        $id = Auth::id();

        $retweets = array();
        foreach ($this->retweets as $retweet) {
            array_push($retweets, $retweet->user_id);
        }

        if (in_array($id, $retweets)) {
            return true;
        } else {
            return false;
        }
    }
    // 写真追加
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
