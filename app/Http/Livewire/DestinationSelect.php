<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class DestinationSelect extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$destinations = \App\Models\Destination::with('city');

        if($searchTerm) {
            $destinations = \App\Models\Destination::whereHas('city', function(Builder $query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $destinations = $destinations->limit(10)->get();


        return $destinations->mapWithKeys(function ($item, $key) {
            return [$key => [
                'value' => $item->id, 'description' => $item->city->name
            ]];
        });

	}

    public function selectedOption($value)
    {
        return $this->loadSelected($value, \App\Models\Country::class);
    }

}
