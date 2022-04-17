<div class="mt-5">
    <x-label>País de destino</x-label>
    <livewire:location.country
        name="country_id"
        :value="old('country_id', $country_id ?? '')"
        :searchable="true"
        placeholder="Selecciona un país de destino"
    />
    @error('country_id') <span class="text-red-500 font-semibold">{{$errors->first('country_id')}}</span> @enderror
</div>

<div class="mt-5">
    <x-label>Estado/provincia</x-label>
    <livewire:location.division
        name="division_id"
        :value="old('division_id', $division_id ?? '')"
        placeholder="Selecciona un estado/provincia"
        :depends-on="['country_id']"
    />
    @error('division_id') <span class="text-red-500 font-semibold">{{$errors->first('division_id')}}</span> @enderror
</div>

<div class="mt-5">
    <x-label>Ciudad</x-label>
    <livewire:location.city
        name="city_id"
        :value="old('city_id', $city_id ?? '')"
        placeholder="Selecciona una ciudad"
        :depends-on="['country_id', 'division_id']"
    />
    @error('city_id') <span class="text-red-500 font-semibold">{{$errors->first('city_id')}}</span> @enderror
</div>
