@extends('layouts.external.layout')

@section('header', 'Cambiar silla')

@section('content')

<div class="grid justify-items-center text-center">
    <div class="flex">
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
                                    <div class="w-8 px-3">F</div>
                                    <div class="w-8 px-3">G</div>
                                </div>
                            @endif
                        @endif
                        <div class="flex gap-4">
                            @if($i==0)<div class="h-8 w-8">{{$j+1}}</div>@endif
                            @if($j<4)
                                <div class="h-8 w-8 cursor-pointer @if($seats['A'.$j] == 'busy') bg-red-500 @else bg-sky-200 @endif"></div>
                                <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                            @else
                                <div class="h-8 w-8 cursor-pointer @if($j == 4 && $i==0) bg-sky-200 @else bg-yellow-200 @endif"></div>
                                <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
                                <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
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
                                <div class="w-8 px-3">F</div>
                                <div class="w-8 px-3">G</div>
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
                                    <div class="w-8 px-3">F</div>
                                    <div class="w-8 px-3">G</div>
                                </div>
                            @else
                            <div class="flex gap-3">
                                <div class="w-8 px-3">H</div>
                                <div class="w-8 px-3">I</div>
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
                                        <div class="h-8 w-8 cursor-pointer @if($seats['A'.($j+1)] == 'busy') bg-red-500 @else bg-sky-200 @endif"></div>
                                        <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                    @else
                                        <div class="h-8 w-8 cursor-pointer @if($seats['A'.($j+1)] == 'busy' && $i==0) bg-red-500 @else bg-yellow-200 @endif "></div>
                                        <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
                                    @endif

                                @endif

                                @if($i==2)<div class="h-8 w-8">{{$j+1}}</div>@endif
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
                            @if($j<6)
                                <div class="flex gap-4">
                                    <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-sky-200"></div>
                                </div>
                            @else
                                <div class="flex gap-4">
                                    <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
                                    <div class="h-8 w-8 cursor-pointer bg-yellow-200"></div>
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
                                    <div class="w-8 px-3">F</div>
                                    <div class="w-8 px-3">G</div>
                                </div>
                            @else
                                <div class="flex gap-3">
                                    <div class="w-8 px-3">H</div>
                                    <div class="w-8 px-3">I</div>
                                </div>
                            @endif
                        @endif
                    @endfor
                </div>
            @endfor
        @endif
    </div>
</div>


@endsection
