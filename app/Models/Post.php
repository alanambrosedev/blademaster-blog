<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'body', 'published_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // model accessor
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->body), 200);
        /*strip_tags will remove any HTML tags from the body
        Example: <p>Hello <strong>World</strong></p> → Hello World
        Uses laravel string helper to truncate teh text to 200 characters.If the text is longer
        it appends .. at the end by default.
        Example: <p>This is a <strong>long</strong> article body with HTML tags...</p> →
        This is a long article body with HTML tags...   // truncated to 200 chars
        */
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }
}
