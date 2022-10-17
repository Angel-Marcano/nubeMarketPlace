<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCollection extends Model
{
    use HasFactory;
    protected $table = "payment_collection";
    public $timestamps =true;

    public function collection()
    {
        return $this->belongsTo(\App\Models\Collection::class, 'collection_id');
    }
}
