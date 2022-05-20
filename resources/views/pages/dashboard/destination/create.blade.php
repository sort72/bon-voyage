@extends('layouts.dashboard.layout')

@section('header', 'Crear destino')

@section('content')

<div class="pb-2 mb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="flex justify-end">
                <a class="text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-700" href="{{route('dashboard.destination.index')}}">Volver al listado</a>
            </div>
            <div class="p-5 border-b bg-white max-w-lg mx-auto border-gray-200 sm:rounded-lg shadow-md">
                <form method="POST" action="{{route('dashboard.destination.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center flex-col">

                        @include('components.location-select')

                        <div class="mt-5">
                            <x-label>Zona horaria</x-label>
                            <livewire:location.timezone
                                name="timezone"
                                :value="$errors->has('timezone') ? '' : old('timezone')"
                                placeholder="Selecciona una zona horaria"
                                :searchable="true"
                            />
                            @error('timezone') <span class="text-red-500 font-semibold">{{$errors->first('timezone')}}</span> @enderror
                        </div>
                        <div class="mt-5">
                            <x-label>File Upload</x-label>
                            <div class="flex items-center justify-center w-full mt-2">
                                <label
                                    class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                    <div class="flex flex-col items-center justify-center pt-7" id="upload">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="pt-1 text-sm font-bold text-gray-400 group-hover:text-gray-600">
                                            Attach a file</p>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-center pt-3 text-sky-300 group-hover:text-sky-500" id="uploaded" style="display:none">
                                        <div class="flex flex-col items-center justify-center mx-8">
                                            <svg class="w-8 h-8" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M10,17L6.5,13.5L7.91,12.08L10,14.17L15.18,9L16.59,10.41M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z" />
                                            </svg>
                                            <p class="pt-1 text-sm font-bold">
                                                File attached</p>
                                        </div>
                                        <img class="h-24" id="output"/>
                                    </div>
                                    <input accept="image/*" type="file" class="opacity-0" required id="image" name="image" value="" onchange="updateData(event)" />
                                </label>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class=" my-2 w-24 text-white py-2 px-5 rounded bg-sky-500 hover:bg-sky-600">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function updateData(event){
            image = document.getElementById('image');
            upload = document.getElementById('upload');
            uploaded = document.getElementById('uploaded');

            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }

            if(image.value != "")
            {
                upload.style.display = "none";
                uploaded.style.display = ""
            }
        }
    </script>
@endpush

@endsection
