<div class="relative col-span-3 text-center" x-data="dropdown">
    <button type="button" class="font-bold" @click="toggle"><input class="focus:outline-0" id="client_data" value="1 Persona, Económica" /> </button>
    <div x-cloak x-show="open" @click.away="open = false" class="absolute -right-24 h-fit w-72 py-4 px-3 z-50 bg-white shadow-lg rounded-lg">
        <div class="flex flex-col gap-8 mx-2">
            <div class="flex flex-wrap">
                <div class="flex flex-col text-left w-1/2">
                    <x-label class="text-xl">Adultos</x-label>
                    <x-label class="text-gray-400 text-sm">Desde 18 años</x-label>
                </div>
                <div class="flex flex-wrap w-1/2 content-center">
                    <button data-action="decrement" type="button" class="text-center bg-sky-400 text-white hover:bg-sky-500 h-8 w-8 rounded-l cursor-pointer outline-none">
                        <span class="place-items-center text-center text-2xl" >−</span>
                    </button>
                    <input type="number" class="border-0 w-10 h-8 outline-none focus:outline-none text-center bg-sky-400 font-semibold text-md focus:text-black  md:text-basecursor-default flex items-center text-white outline-none" name="custom-input-number" id="adults" value="1"></input>
                    <button data-action="increment" type="button" class="text-center bg-sky-400 text-white hover:bg-sky-500 h-8 w-8 rounded-r cursor-pointer">
                        <span class="text-2xl place-items-center text-center">+</span>
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="flex flex-col text-left w-1/2">
                    <x-label class="text-xl">Menores</x-label>
                    <x-label class="text-gray-400 text-sm">Hasta 17 años</x-label>
                </div>
                <div class="flex flex-wrap w-1/2 content-center">
                    <button data-action="decrementKids" type="button" class="text-center bg-sky-400 text-white hover:bg-sky-500 h-8 w-8 rounded-l cursor-pointer outline-none">
                        <span class="place-items-center text-center text-2xl" >−</span>
                    </button>
                    <input type="number" class="border-0 w-10 h-8 outline-none focus:outline-none text-center bg-sky-400 font-semibold text-md focus:text-black  md:text-basecursor-default flex items-center text-white outline-none" name="custom-input-number" id="kids" value="0"></input>
                    <button data-action="incrementKids" type="button" class="text-center bg-sky-400 text-white hover:bg-sky-500 h-8 w-8 rounded-r cursor-pointer">
                        <span class="text-2xl place-items-center text-center">+</span>
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap content-center">
                <x-label class="text-xl w-1/3 text-left">Clase</x-label>
                <select id="flight_class" onchange="updateData()" class="w-2/3 rounded border-gray-300 h-10">
                    <option value="economy_class">Económica</option>
                    <option value="first_class">Primera Clase</option>
                </select>
            </div>
        </div>
    </div>
</div>
<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .custom-number-input input:focus {
      outline: none !important;
    }

    .custom-number-input button:focus {
      outline: none !important;
    }
  </style>

  <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdown', () => ({
            open: false,
            toggle() {
                this.open = ! this.open
            }
        }))
    })

    function updateData(){
      adults = document.getElementById('adults');
      kids = document.getElementById('kids');
      people = Number(adults.value) + Number(kids.value);
      client_data = document.getElementById('client_data');
      flight_class = document.getElementById('flight_class');

      final_client_data = people+' '
      if(people > 1)
        final_client_data += 'Personas'
      else
        final_client_data += 'Persona'

      if(flight_class.value == 'economy_class')
        final_client_data += ', Económica'
      else
        final_client_data += ', Primera Clase'

      client_data.value = final_client_data
    }


    function decrement(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      if(value !== 1)
        value--;
      target.value = value;
      updateData();
    }

    function decrementKids(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrementKids"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      if(value !== 0)
        value--;
      target.value = value;
      updateData();
    }

    function increment(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      value++;
      target.value = value;
      updateData();
    }

    function incrementKids(e) {
      const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrementKids"]'
      );
      const target = btn.nextElementSibling;
      let value = Number(target.value);
      value++;
      target.value = value;
      updateData();
    }

    const decrementButtons = document.querySelectorAll(
      `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
      `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
      btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
      btn.addEventListener("click", increment);
    });

    const decrementKidsButtons = document.querySelectorAll(
      `button[data-action="decrementKids"]`
    );

    const incrementKidsButtons = document.querySelectorAll(
      `button[data-action="incrementKids"]`
    );

    decrementKidsButtons.forEach(btn => {
      btn.addEventListener("click", decrementKids);
    });

    incrementKidsButtons.forEach(btn => {
      btn.addEventListener("click", incrementKids);
    });
  </script>
