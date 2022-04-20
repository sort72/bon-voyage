<?php

namespace App\Http\Livewire\Location;

use App\Http\Livewire\LivewireSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Division extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$divisions = \App\Models\Division::select('id', 'name');

        $countryId = $this->getDependingValue('country_id');

        if ($this->hasDependency('country_id') && $countryId != null) {
            $divisions = $divisions->where('country_id', $countryId);
        }
        else {
            return collect();
        }

        $divisions = $divisions->get();

        return $this->mapKeys($divisions);

	}

    public function selectedOption($value)
    {
        return $this->loadSelected($value, \App\Models\Division::class);
    }


}
