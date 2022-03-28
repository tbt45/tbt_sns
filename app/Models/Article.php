<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

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
}
