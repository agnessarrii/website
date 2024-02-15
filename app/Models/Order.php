<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = "orders";
    public $timestamps = false;

    public function cars()
    {
        return $this->belongsTo(Cars::class,'id_car','id');
    }
}