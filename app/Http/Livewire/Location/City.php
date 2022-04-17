<?php

namespace App\Http\Livewire\Location;

use App\Http\Livewire\LivewireSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class City extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$cities = \App\Models\City::select('id', 'name');

        $stateId = $this->getDependingValue('division_id');

        if ($this->hasDependency('division_id') && $stateId != null) {
            $cities = $cities->where('division_id', $stateId);
        }
        else {
            return collect();
        }

        $cities = $cities->get();

        return $this->mapKeys($cities);

	}

    public function selectedOption($value)
    {
        return $this->loadSelected($value, \App\Models\City::class);
    }

}
