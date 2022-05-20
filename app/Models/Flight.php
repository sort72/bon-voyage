<?php

namespace App\Models;

use App\Helpers\LocationHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id')->withTrashed();
    }

    public function origin()
    {
        return $this->belongsTo(Destination::class, 'origin_id')->withTrashed();
    }

    public function getDurationAttribute()
    {
        return $this->departure_time->diffInMinutes($this->arrival_time);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class)->withTrashed();
    }
}
