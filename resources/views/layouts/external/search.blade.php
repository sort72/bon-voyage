<div class="sm:py-8 h-hit w-full bg-sky-300 flex content-center">
    <div class="h-fit flex justify-center items-center content-center p-2 md:p-0 self-center">
        <div class="sm:w-2/3 w-full p-6 bg-sky-600 shadow-lg rounded-lg">
            <div class="flex mb-3 text-center">
                <h3 class="text-xl text-white font-bold mr-6">Busca tu vuelo</h3>
                <!-- Code block starts -->
                <div class="flex items-center">
                    <div class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                        <input aria-labelledby="label1" checked type="radio" name="radio" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 focus:outline-none text-sky-500 border rounded-full border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" />
                        <div class="check-icon hidden border-4 border-sky-500 rounded-full w-full h-full z-1"></div>
                    </div>
                    <label id="label1" class="ml-2 text-sm leading-4 font-normal text-white">Ida y vuelta</label>
                </div>
                <!-- Code block ends -->
                <!-- Code block starts -->
                <div class="flex items-center ml-6">
                    <div class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                        <input aria-labelledby="label2" type="radio" name="radio" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 focus:outline-none border rounded-full text-sky-500 border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" />
                        <div class="check-icon hidden border-4 border-sky-500 rounded-full w-full h-full z-1"></div>
                    </div>
                    <label id="label2" class="ml-2 text-sm leading-4 font-normal text-white">Solo ida</label>
                </div>
                <!-- Code block ends -->
            </div>
            <form action="{{ route('external.flights') }}">
                <div class="lg:flex">
                    <div class="flex lg:w-1/3 lg:mr-3 w-full mb-2 lg:mb-0">
                        <div class="w-1/2">
                            <div class="grid grid-cols-3 rounded-l border-r-2 border-gray-600 bg-white items-center p-2 h-16">
                                <label id="label2" class="col-span-3 ml-2 text-sm leading-4">Origen</label>
                                <i class="ml-2 fa-solid fa-map-pin"></i>
                                {{-- <input type="text" class="max-w-full rounded focus:outline-offset-0 focus:outline-sky-500 border-none text-gray-700"/> --}}
                                <div class="col-span-2">
                                    <livewire:destination-select
                                        name="origin_id"
                                        :value="old('origin_id')"
                                        :searchable="true"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="grid grid-cols-3 rounded-r bg-white items-center p-2 h-16">
                                <label id="label2" class="col-span-3 ml-2 text-sm leading-4 ">Destino</label>
                                <i class="ml-2 fa-solid fa-location-dot"></i>
                                <div class="col-span-2">
                                    <livewire:destination-select
                                        name="destination_id"
                                        :value="old('destination_id')"
                                        :searchable="true"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex lg:w-1/4 lg:mr-3 mb-2 lg:mb-0">
                        <div class="w-1/2">
                            <div class="grid grid-cols-3 rounded-l border-r-2 border-gray-600 bg-white items-center p-2 h-16">
                                <label id="label2" class="col-span-3 ml-2 text-xs leading-4">Fecha ida</label>
                                <i class="ml-2 fa-solid fa-calendar-days"></i>
                                <input type="text"  placeholder="Ida" class="departure_date col-span-2 rounded focus:outline-offset-0 focus:outline-sky-500 border-none text-gray-700"/>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="grid grid-cols-3 rounded-r bg-white items-center p-2 h-16">
                                <label id="label2" class="col-span-3 ml-2 text-xs leading-4">Fecha vuelta</label>
                                <input type="text" placeholder="Vuelta" class="back_date col-span-3 rounded focus:outline-offset-0 focus:outline-sky-500 border-none text-gray-700"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex lg:w-1/4 mb-2 lg:mb-0">
                        <div class="w-full">
                            <div class="grid grid-cols-3 rounded-lg border-gray-600 bg-white items-center p-2 h-16">
                                <label id="label2" class="col-span-3 ml-2 text-sm leading-4">Pasajeros y clase</label>
                                <i class="ml-2 fa-solid fa-user"></i>
                                {{-- <input type="text" placeholder="Seleccione" class="col-span-2 rounded focus:outline-offset-0 focus:outline-sky-500 border-none text-gray-700"/> --}}
                                @include('layouts.external.passengers-select')
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 col-start-2 text-center">
                        <button class=" mx-3 lg:my-4 mt-3 bg-orange-600 transition duration-150 ease-in-out hover:bg-orange-500 rounded-lg font-semibold text-white p-2 text-sm focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-orange-500"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener("load", function(event) {
            window.flatpickr('.departure_date', {
                locale: window.flatpickr_spanish,
                onChange: function(selectedDates, dateStr, instance) {
                    window.flatpickr('.back_date', {
                        locale: window.flatpickr_spanish,
                        minDate: dateStr
                    })
                },
                minDate: new Date()
            })

            window.flatpickr('.back_date', {
                locale: window.flatpickr_spanish,
                minDate: new Date()
            })
        });

    </script>

@endpush
