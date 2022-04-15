<?php

namespace App\Http\Livewire\Location;

use App\Http\Livewire\LivewireSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class State extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$states = \App\Models\State::select('id', 'name');

        $countryId = $this->getDependingValue('country_id');

        if ($this->hasDependency('country_id') && $countryId != null) {
            $states = $states->where('country_id', $countryId);
        }
        else {
            return collect();
        }

        $states = $states->get();

        return $this->mapKeys($states);

	}

    public function selectedOption($value)
    {
        return $this->loadSelected($value, \App\Models\State::class);
    }


}
