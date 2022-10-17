<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    public $timestamps =true;

    public function receipts()
    {
        return $this->hasMany(\App\Models\Receipts::class, 'client_id');
    }

    public function Business()
    {
        return $this->belongsTo(\App\Models\Business::class, 'business_id');
    }
}
