<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Destination extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getImagePathAttribute()
    {

        $path = 'storage/destinations/'.$this->id .'.png';

        return file_exists($path) ? asset($path) : asset('images/default_image.png');
    }
}
