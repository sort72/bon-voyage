<div class="lg:w-96 w-full mr-2 justify-center mb-6 rounded overflow-hidden shadow-lg {{ $flight->discount ? 'border-2 border-dashed border-yellow-500' : '' }}">
    <img class="w-full" src="{{ $flight->destination->image_path }}" alt="Vuelo {{ $flight->name }}">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$flight->origin->city->name}} - {{$flight->destination->city->name}}</div>
      <p class="text-gray-700 text-base">
        {{ DateHelper::beautify($flight->departure_time, 'complete_with_time', $flight->origin->timezone) }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2 flex flex-wrap">
      <span class="inline-block bg-yellow-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $flight->name }}</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ FlightHelper::getFlightAvailableSeats($flight)['total'] }} sillas disponibles!</span>
      @if ($flight->discount)
        <span class="inline-block bg-blue-400 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">¡Vuelo con descuento!</span>
      @endif
      <span class="inline-block bg-green-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-800 mr-2 mb-2">Desde {{ currency_format($flight->discounted_economy) }}</span>
    </div>
</div>
