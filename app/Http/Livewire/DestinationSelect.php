<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class DestinationSelect extends LivewireSelectExternal
{
    public function options($searchTerm = null) : Collection
	{
		$destinations = \App\Models\Destination::with('city');


        if($searchTerm) {
            $destinations = \App\Models\Destination::whereHas('city', function(Builder $query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        $originId = $this->getDependingValue('origin_id');

        if($this->hasDependency('origin_id') && $originId != null) {
            $destinations = $destinations->where('id', '<>', $originId);
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
        $resource = \App\Models\Destination::where('id', $value)->with('city')->first();
        if($resource) {
            return [
                'value' => $value,
                'description' => $resource->city->name
            ];
        }

        return [
            'value' => null,
            'description' => 'Selecciona...'
        ];
    }

}
