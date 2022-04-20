<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireSelect\LivewireSelect as BaseLivewireSelect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class LivewireSelect extends BaseLivewireSelect
{
    public $noResultsMessage = 'No se encontraron resultados';

    public function styles()
    {
        $this->reset('noResultsMessage');

        return [
            'default' => 'p-2 rounded border shadow border-gray-300 outline-1 outline-gray-900 bg-gray-50 w-full appearance-none',

            'searchSelectedOption' => 'p-2 rounded shadow border border-gray-300 outline-1 outline-gray-900 bg-gray-50 w-full bg-white flex items-center',
            'searchSelectedOptionTitle' => 'w-full text-gray-900 text-left',
            'searchSelectedOptionReset' => 'h-4 w-4 text-gray-500',

            'search' => 'relative',
            'searchInput' => 'p-2 rounded shadow border border-gray-300 outline-1 outline-gray-900 bg-gray-50 w-full rounded',
            'searchOptionsContainer' => 'absolute top-12 left-0 mt-12 w-full z-10 bg-white',

            'searchOptionItem' => 'p-3 hover:bg-gray-100 bg-white cursor-pointer text-sm',
            'searchOptionItemActive' => 'bg-gray-100 text-gray-900 font-medium',
            'searchOptionItemInactive' => 'bg-white text-gray-600',

            'searchNoResults' => 'p-6 w-full bg-white border text-center text-xs font-semibold text-gray-600',
        ];
    }

    public function mapKeys(Collection $collection)
    {
        return $collection->mapWithKeys(function ($item, $key) {
            return [$key => [
                'value' => $item->id, 'description' => $item->name
            ]];
        });
    }

    public function loadSelected($value, $model)
    {
        $resource = $model::where('id', $value)->first();
        if($resource) {
            return [
                'value' => $value,
                'description' => $resource->name
            ];
        }

        return [
            'value' => null,
            'description' => 'Selecciona...'
        ];
    }

    public function getListeners()
    {
        $listeners = parent::getListeners();
        if($this->dependsOn) $listeners[$this->name . 'Sync'] = 'syncDependencies';
        $listeners[$this->name . 'RefreshDependency'] = 'refreshDependency';
        return $listeners;
    }

    public function syncDependencies()
    {
        foreach ($this->dependsOnValues as $dependency => $value) {
            if(!$value) $this->emit($dependency . 'RefreshDependency');
        }
    }

    public function refreshDependency()
    {
        $this->notifyValueChanged();
    }

}
