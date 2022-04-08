<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id')->withTrashed();
    }

    public function origin()
    {
        return $this->belongsTo(Destination::class, 'origin_id')->withTrashed();
    }
}
