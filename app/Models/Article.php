<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'article_id');
    }
    public function retweets(): HasMany
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
}
