<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $table = "collection";
    public $timestamps =true;

    public function paymentCollection()
    {
        return $this->hasMany(\App\Models\PaymentCollection::class, 'receipts_id');
    }

    public function receipts()
    {
        return $this->belongsTo(\App\Models\Client::class, 'receipts_id');
    }

}
