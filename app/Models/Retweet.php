<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Retweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
