<select
    name="{{ $name }}"
    class="{{ $styles['default'] }}"
    wire:model="value"
    wire:click="$emit('{{$name}}Sync')">

    @if (!empty($value) && $options->doesntContain('value', $value))
        <option value="{{ $selectedOption['value'] }}">
            {{ $selectedOption['description'] }}
        </option>
    @endif

    <option value="">
        {{ $placeholder }}
    </option>


    @foreach($options as $option)
        <option value="{{ $option['value'] }}">
            {{ $option['description'] }}
        </option>
    @endforeach
</select>
