<?php

namespace App\Http\Livewire\Location;

use App\Http\Livewire\LivewireSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Country extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$countries = \App\Models\Country::select('id', 'name')
                    ->has('cities');

        if($searchTerm) {
            $countries = $countries->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        $countries = $countries->limit(10)->get();

        return $this->mapKeys($countries);

	}

    public function selectedOption($value)
    {
        return $this->loadSelected($value, \App\Models\Country::class);
    }

}
