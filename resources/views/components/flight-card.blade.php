<div class="lg:w-96 w-full mr-2 justify-center mb-6 rounded overflow-hidden shadow-lg">
    <img class="w-full" src="https://cdn.pixabay.com/photo/2016/03/04/19/36/beach-1236581_1280.jpg" alt="Sunset in the mountains">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$flight->origin->city->name}} - {{$flight->destination->city->name}}</div>
      <p class="text-gray-700 text-base">
        {{ DateHelper::beautify($flight->departure_time, 'complete_with_time') }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-yellow-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $flight->name }}</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ FlightHelper::getFlightAvailableSeats($flight)['total'] }} sillas disponibles!</span>
    </div>
</div>
