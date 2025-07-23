<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Content extends Model
{
    protected $fillable = ['post_id', 'featured_image', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
