<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = "roles";
    public $timestamps =true;

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
