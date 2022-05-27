@extends('layouts.external.layout')

@section('header', 'Cambiar silla')

@section('content')

<div class="grid justify-items-center text-center">
    <p class="mt-0 text-center sm:text-xl md:text-2xl mb-4 font-bold text-gray-500">Tu silla actual es: <b>{{$ticket->seat}}</b>, puedes cambiarla!</p>
    <a href="{{ route('external.confirm-checkin',$ticket->id) }}" class="my-6 bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded"> Continuar sin cambiar mi silla</a>
    <div class="flex mb-6">
        @if($flight->is_international != 1)
            @for ($i = 0; $i <2; $i++)
                <div class="flex flex-col gap-3 pr-8">
                    @for ($j = 0; $j <25; $j++)
                        @if ($j == 0)
                            @if($i == 0)
                                <div class="flex gap-3 pl-12">
                                    <div class="w-8 px-3">A</div>
                                    <div class="w-8 px-3">B</div>
                                    <div class="w-8 px-3">C</div>
                                </div>
                            @else
                                <div class="flex gap-3">
                                    <div class="w-8 px-3">D</div>
                                    <div class="w-8 px-3">E</div>
                                    <div class="w-8 px-3">F</div>
                                </div>
                            @endif
                        @endif
                        <div class="flex gap-4">
                            @if($i==0)<div class="h-8 w-8">{{$j+1}}</div>@endif
                            @if($j<4)
                                <a @if($i==0) onclick="changeSeat('A{{$j+1}}','first_class')" @else onclick="changeSeat('D{{$j+1}}','first_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['A'.($j+1)] == 'busy' && $i==0) || ($seats['D'.($j+1)] == 'busy' && $i==1)) @if(($ticket->seat == 'A'.($j+1) && $i==0) || ($ticket->seat == 'D'.($j+1) && $i==1)) bg-green-500 @else bg-red-500 @endif  @else bg-sky-200 @endif "></a>
                                <a @if($i==0) onclick="changeSeat('B{{$j+1}}','first_class')" @else onclick="changeSeat('E{{$j+1}}','first_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['B'.($j+1)] == 'busy' && $i==0) || ($seats['E'.($j+1)] == 'busy' && $i==1)) @if($ticket->seat == 'B'.($j+1) && $i==0 || $ticket->seat == 'E'.($j+1) && $i==1) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                <a @if($i==0) onclick="changeSeat('C{{$j+1}}','first_class')" @else onclick="changeSeat('F{{$j+1}}','first_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['C'.($j+1)] == 'busy' && $i==0) || ($seats['F'.($j+1)] == 'busy' && $i==1)) @if($ticket->seat == 'C'.($j+1) && $i==0 || $ticket->seat == 'F'.($j+1) && $i==1) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                            @else
                                <a @if($i==0) onclick="changeSeat('A{{$j+1}}','economy_class')" @else onclick="changeSeat('D{{$j+1}}','economy_class')" @endif class="h-8 w-8 cursor-pointer @if($j == 4 && $i==0) @if($seats['A'.($j+1)] == 'busy') @if(($ticket->seat == 'A'.($j+1) && $i==0) || ($ticket->seat =='D'.($j+1) && $i==1)) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif @else @if($seats['D'.($j+1)] == 'busy'&& $i==1) @if($ticket->seat == 'A'.($j+1) && $i==0|| $ticket->seat =='D'.($j+1) && $i==1) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif @endif"></a>
                                <a @if($i==0) onclick="changeSeat('B{{$j+1}}','economy_class')" @else onclick="changeSeat('E{{$j+1}}','economy_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['B'.($j+1)] == 'busy' && $i==0) || ($seats['E'.($j+1)] == 'busy' && $i==1)) @if($ticket->seat == 'B'.($j+1) && $i==0 || $ticket->seat =='E'.($j+1) && $i==1) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                <a @if($i==0) onclick="changeSeat('C{{$j+1}}','economy_class')" @else onclick="changeSeat('F{{$j+1}}','economy_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['C'.($j+1)] == 'busy' && $i==0) || ($seats['F'.($j+1)] == 'busy' && $i==1)) @if($ticket->seat == 'C'.($j+1) && $i==0 || $ticket->seat =='F'.($j+1) && $i==1) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                            @endif

                            @if($i==1)<div class="h-8 w-8">{{$j+1}}</div>@endif
                        </div>
                        @if ($j == floor((25/2)))
                            @if($i == 0)
                            <div class="flex gap-3 pl-12">
                                <div class="w-8 px-3">A</div>
                                <div class="w-8 px-3">B</div>
                                <div class="w-8 px-3">C</div>
                            </div>
                            @else
                            <div class="flex gap-3">
                                <div class="w-8 px-3">D</div>
                                <div class="w-8 px-3">E</div>
                                <div class="w-8 px-3">F</div>
                            </div>
                            @endif
                        @endif
                    @endfor
                </div>
            @endfor
        @else
            @for ($i = 0; $i <3; $i++)
                <div class="flex flex-col gap-3 pr-8">
                    @for ($j = 0; $j <32; $j++)
                        @if ($j == 0)
                            @if($i == 0)
                                <div class="flex gap-3 pl-12">
                                    <div class="w-8 px-3">A</div>
                                    <div class="w-8 px-3">B</div>
                                </div>
                            @elseif ($i==1)
                                <div class="flex gap-3">
                                    <div class="w-8 px-3">C</div>
                                    <div class="w-8 px-3">D</div>
                                    <div class="w-8 px-3">E</div>
                                    <div class="w-8 px-3">F</div>
                                </div>
                            @else
                            <div class="flex gap-3">
                                <div class="w-8 px-3">G</div>
                                <div class="w-8 px-3">H</div>
                            </div>
                            @endif
                        @endif
                        @if($i==0 || $i==2)
                            <div class="flex gap-4">
                                @if($i==0)<div class="h-8 w-8">{{$j+1}}</div>@endif
                                @if($i==2 && $j==31)
                                    <div class="h-8 w-8 bg-transparent"></div>
                                    <div class="h-8 w-8 bg-transparent"></div>
                                @else
                                    @if($j<6 || ($i==0 && $j==6))
                                        <a @if($i==0) onclick="changeSeat('A{{$j+1}}','first_class')" @else onclick="changeSeat('G{{$j+1}}','first_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['A'.($j+1)] == 'busy' && $i==0) || ($seats['G'.($j+1)] == 'busy' && $i==2)) @if($ticket->seat == 'A'.($j+1) && $i==0 || $ticket->seat =='G'.($j+1)&& $i==2) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                        <a @if($i==0) onclick="changeSeat('B{{$j+1}}','first_class')" @else onclick="changeSeat('H{{$j+1}}','first_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['B'.($j+1)] == 'busy' && $i==0) || ($seats['H'.($j+1)] == 'busy' && $i==2)) @if($ticket->seat == 'B'.($j+1) && $i==0 || $ticket->seat =='H'.($j+1)&& $i==2) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                    @else
                                        @if($j == 31)
                                            <a onclick="changeSeat('A{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['A'.($j+1)] == 'busy')) @if($ticket->seat == 'A'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif "></a>
                                            <a onclick="changeSeat('B{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['B'.($j+1)] == 'busy')) @if($ticket->seat == 'B'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                        @else
                                            <a @if($i==0) onclick="changeSeat('A{{$j+1}}','economy_class')" @else onclick="changeSeat('G{{$j+1}}','economy_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['A'.($j+1)] == 'busy' && $i==0) || ($seats['G'.($j+1)] == 'busy' && $i==2)) @if($ticket->seat == 'A'.($j+1) && $i==0|| $ticket->seat =='G'.($j+1)&& $i==2) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif "></a>
                                            <a @if($i==0) onclick="changeSeat('B{{$j+1}}','economy_class')" @else onclick="changeSeat('H{{$j+1}}','economy_class')" @endif class="h-8 w-8 cursor-pointer @if(($seats['B'.($j+1)] == 'busy' && $i==0) || ($seats['H'.($j+1)] == 'busy' && $i==2)) @if($ticket->seat == 'B'.($j+1) && $i==0|| $ticket->seat =='H'.($j+1)&& $i==2) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                        @endif

                                    @endif

                                @endif

                                @if($i==2)<div class="h-8 w-8">{{$j+1}}</div>@endif
                            </div>
                        @else
                            @if($j<6)
                                <div class="flex gap-4">
                                    <a onclick="changeSeat('C{{$j+1}}','first_class')" class="h-8 w-8 cursor-pointer @if(($seats['C'.($j+1)] == 'busy')) @if($ticket->seat == 'C'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                    <a onclick="changeSeat('D{{$j+1}}','first_class')" class="h-8 w-8 cursor-pointer @if(($seats['D'.($j+1)] == 'busy')) @if($ticket->seat == 'D'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                    <a onclick="changeSeat('E{{$j+1}}','first_class')" class="h-8 w-8 cursor-pointer @if(($seats['E'.($j+1)] == 'busy')) @if($ticket->seat == 'E'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                    <a onclick="changeSeat('F{{$j+1}}','first_class')" class="h-8 w-8 cursor-pointer @if(($seats['F'.($j+1)] == 'busy')) @if($ticket->seat == 'F'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-sky-200 @endif"></a>
                                </div>
                            @else
                                @if($j==31)
                                    <div class="flex gap-4">
                                        <div class="h-8 w-8 bg-transparent"></div>
                                        <div class="h-8 w-8 bg-transparent"></div>
                                        <div class="h-8 w-8 bg-transparent"></div>
                                        <div class="h-8 w-8 bg-transparent"></div>
                                    </div>
                                @else
                                    <div class="flex gap-4">
                                        <a onclick="changeSeat('C{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['C'.($j+1)] == 'busy')) @if($ticket->seat == 'C'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                        <a onclick="changeSeat('D{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['D'.($j+1)] == 'busy')) @if($ticket->seat == 'D'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                        <a onclick="changeSeat('E{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['E'.($j+1)] == 'busy')) @if($ticket->seat == 'E'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                        <a onclick="changeSeat('F{{$j+1}}','economy_class')" class="h-8 w-8 cursor-pointer @if(($seats['F'.($j+1)] == 'busy')) @if($ticket->seat == 'F'.($j+1)) bg-green-500 @else bg-red-500 @endif @else bg-yellow-200 @endif"></a>
                                    </div>
                                @endif
                            @endif

                        @endif
                        @if ($j == floor((25/2)))
                            @if($i == 0)
                                <div class="flex gap-3 pl-12">
                                    <div class="w-8 px-3">A</div>
                                    <div class="w-8 px-3">B</div>
                                </div>
                            @elseif ($i==1)
                                <div class="flex gap-3">
                                    <div class="w-8 px-3">C</div>
                                    <div class="w-8 px-3">D</div>
                                    <div class="w-8 px-3">E</div>
                                    <div class="w-8 px-3">F</div>
                                </div>
                            @else
                                <div class="flex gap-3">
                                    <div class="w-8 px-3">G</div>
                                    <div class="w-8 px-3">H</div>
                                </div>
                            @endif
                        @endif
                    @endfor
                </div>
            @endfor
        @endif
    </div>

</div>

@push('scripts')
    <script>
        function changeSeat(seat,seat_class)
        {
            var ticket = {!! json_encode($ticket->toArray()) !!};
            var ticket_id = ticket['id'];
            var ticket_class = ticket['type'];
            var seats = {!! json_encode($seats) !!} ;

            if(seats[seat] == 'busy')
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Esta silla ya está ocupada!'
                })
            }
            else
            {
                if(seat_class == ticket_class)
            {
                Swal.fire({
                title: '<strong>Está a punto de cambiar su silla</strong>',
                icon: 'info',
                html:
                    `La silla elegida es <b>`+seat+`</b>
                    ¿Desea cambiar a esta?
                    <form method="POST"
                        action="{{ route('external.update-seat') }}">
                        @csrf
                        <input name="seat" value="`+seat+`" hidden/>
                        <input name="ticket" value="`+ticket_id+`" hidden />
                        <button class=" mt-4 bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"><i class="fa-solid fa-arrow-right-arrow-left"></i> Cambiar</button>
                    </form>`,
                showCloseButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonColor: '#d33',
                cancelButtonAriaLabel: 'Cancelar'
                })
            }
            else
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Solo puedes cambiar a una silla de tu misma clase!'
                })
            }
            }


        }
    </script>
@endpush

@endsection
