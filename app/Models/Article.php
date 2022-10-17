<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = "Article";
    public $timestamps =true;

    public function inventarios()
    {
        return $this->hasMany(\App\Models\Inventory::class, 'article_id');
    }
}
