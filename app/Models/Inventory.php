<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = "inventory";
    public $timestamps =true;

    public function article()
    {
        return $this->belongsTo(\App\Models\Article::class, 'article_id');
    }

    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class, 'store_id');
    }
}
