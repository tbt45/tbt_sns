<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'title',
        'body',
        'article_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
