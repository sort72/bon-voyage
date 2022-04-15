<label>FTeee</label>
<select
    name="{{ $name }}"
    class="{{ $styles['default'] }}"
    wire:model="value"
    wire:click="$emit('{{$name}}Sync')">

    <option value="">
        {{ $placeholder }}
    </option>

    @foreach($options as $option)
        <option value="{{ $option['value'] }}">
            {{ $option['description'] }}
        </option>
    @endforeach
</select>
