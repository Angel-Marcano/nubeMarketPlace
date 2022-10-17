<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleReceipts extends Model
{
    use HasFactory;
    protected $table = "article_receipts";
    public $timestamps =true;

    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class, 'article_id');
    }
}
