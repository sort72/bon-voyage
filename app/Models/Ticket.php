<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
