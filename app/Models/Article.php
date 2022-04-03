<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
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

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        foreach($this->likes as $like){
            array_push($likers, $like->user_id);
        }

        if (in_array($id,$likers)) {
            return true;
        }else {
            return false;
        }
    }
}
