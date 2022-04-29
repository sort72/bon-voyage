<div class="relative" x-data="{ open: false }">
    <button @click="open = !open">1 persona, económica</button>

    <div x-cloak x-show="open" class="absolute -right-24 h-fit w-72 py-4 px-3 z-50 bg-white shadow-lg rounded-lg">
        <div class="flex flex-col gap-8">
            <div class="flex flex-row flex-wrap gap-3">
                <x-label>Adultos</x-label>
                <input>
            </div>
            <div class="flex flex-row flex-wrap gap-3">
                <x-label>Menores</x-label>
                <input>
            </div>
            <div class="flex flex-row flex-wrap gap-3">
                <x-label>Clase</x-label>
                <select>
                    <option name="economy_class">Económica</option>
                    <option name="first_class">Primera Clase</option>
                </select>
            </div>
        </div>
    </div>
</div>
