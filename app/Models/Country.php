<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Country extends Model
{
    /**
     * The database table doesn't use 'created_at' and 'updated_at' so we disable it from Inserts/Updates.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_countries';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'has_division' => 'boolean',
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Continent of country
     *
     * @return Continent
     */
    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }

    /**
     * Get next level
     *
     * @return collection
     */
    public function children()
    {
        if ($this->has_division == true) {
            return $this->divisions;
        }
        return $this->cities;
    }
}
