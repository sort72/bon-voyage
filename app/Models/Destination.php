<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

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

        $path = asset('storage/'.$this->id);


        return File::exists($path) ? $path : asset('images/default_image.png');
    }
}
