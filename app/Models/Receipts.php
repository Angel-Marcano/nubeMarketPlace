<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;
    protected $table = "receipts";
    public $timestamps =true;

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id');
    }

    public function collection()
    {
        return $this->hasMany(\App\Models\Collection::class, 'receipts_id');
    }

    public function articlesReceipts()
    {
        return $this->hasMany(\App\Models\ArticleReceipts::class, 'receipts_id');
    }

    public function articles()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'article_receipts', 'receipts_id', 'article_id', 'id', 'id');
    }

  /*  public function Workers()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'planification_workers', 'planification_id', 'trabajador_id', 'id', 'ctrabajador');
    }*/
}
