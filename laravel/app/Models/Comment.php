<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'commenter_name', 'comment_text'];

    // A comment belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
