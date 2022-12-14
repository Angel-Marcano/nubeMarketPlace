<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = "business";
    public $timestamps =true;

    public function receipts()
    {
        return $this->hasMany(\App\Models\Receipts::class, 'client_id');
    }
}
