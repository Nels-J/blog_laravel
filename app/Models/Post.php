<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;

    protected $perPage = 10;

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    /**
     * Get the user(authors) that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
