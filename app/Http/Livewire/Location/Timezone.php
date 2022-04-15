<?php

namespace App\Http\Livewire\Location;

use App\Helpers\LocationHelper;
use App\Http\Livewire\LivewireSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class Timezone extends LivewireSelect
{
    public function options($searchTerm = null) : Collection
	{
		$timezones = collect(LocationHelper::timezones());

        if($searchTerm) {
            $timezones = $timezones->filter(function ($item) use ($searchTerm) {
                // emulate LIKE operator
                return false !== stristr($item, $searchTerm);
            });
        }

        $timezones = $timezones->map(function ($item, $key) {
            return ['value' => $key, 'description' => $item];
        });

        $timezones = collect($timezones->values())->take(7);

        return $timezones;

	}

    public function selectedOption($value)
    {
        return [
            'value' => $value,
            'description' => LocationHelper::timezones()[$value]
        ];
    }

}
