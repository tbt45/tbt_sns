<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = [
        'body',
        'image1',
        'image2',
        'image3',
        'image4',
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
    public function imageFirst()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
    }
    public function imageSecond()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
    }
    public function imageThird()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
    }
    public function imageFourth()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
    }
}
