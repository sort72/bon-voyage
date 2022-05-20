@props([
  'departure_city' => 'Pereira',
  'arrival_city' => 'Cartagena de indias',
])


<div class="container my-8 mx-auto bg-slate-100 overflow-hidden">
  <!-- <div class="w-auto h-auto grid grid-flow-row-dense grid-cols-4 content-center gap-4 divide-x-2 px-4 shadow-md p-8 m-8 rounded-lg bg-white"> -->
  <div class="md:grid md:grid-cols-4 divide-y-2 md:divide-y-0 md:divide-x-2 divide-solid content-center gap-4 py-4 px-4 shadow-md rounded-lg bg-white">
    <!-- Información de vuelos -->
    <div class="col-span-3">
      <div class="m-2 grid grid-cols-5 content-center gap-4 px-4">
        <!-----------------Parte superior-------------------->
        <div class="rounded-lg bg-slate-200">
          <div class="p-4 tracking-wide">
            <div class="flex flex-row space-x-1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.00967 5.12761H11.0097C12.1142 5.12761 13.468 5.89682 14.0335 6.8457L16.5089 11H21.0097C21.562 11 22.0097 11.4477 22.0097 12C22.0097 12.5523 21.562 13 21.0097 13H16.4138L13.9383 17.1543C13.3729 18.1032 12.0191 18.8724 10.9145 18.8724H8.91454L12.4138 13H5.42485L3.99036 15.4529H1.99036L4.00967 12L4.00967 11.967L2.00967 8.54712H4.00967L5.44417 11H12.5089L9.00967 5.12761Z"fill="currentColor"/>
              </svg>
              <h1 class="font-semibold">IDA</h1>
            </div>
            <p class="font-semibold text-slate-500">2022</p>
            <p class="text-slate-500">mie. 2 abr</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg hover:bg-slate-300">
          <div class="p-4">
            <h1 class="font-semibold">PEI</h1>
            <p class="text-slate-500">Pereira</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg hover:bg-slate-300">
          <div class="p-4">
            <h1 class="font-semibold">CTG</h1>
            <p class="text-slate-500">Cartagena de Indias</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg mt-6 ml-4">
          <div class="p-4">
            <p class="text-slate-500">Equipaje</p>
          </div>
        </div>
      </div>
      <!-- Borde morado --> 
      <!-- <div class="m-4 grid grid-cols-5 content-center gap-4 rounded-full px-4 hover:border border-purple-600"> -->
      <div class="m-4 grid grid-cols-5 content-center gap-4 rounded-full px-4 outline outline-1 outline-purple-600 hover:outline-sky-700">
        <!-----------------Parte superior inferior-------------------->
        <div class="hover:bg-slate-300x rounded-full">
          <div class="m-4 p-4 tracking-wide">
            <div class="form-check">
              <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none" type="radio" checked />
              <label class="form-check-label inline-block text-slate-800"> Bon voyage </label>
            </div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x max-w-sm rounded-full">
          <div class="p-4 tracking-wide mt-4">
            <div class="flexx items-centerx flex flex-row space-x-10">
              <div class="text-lg font-semibold">17:30</div>
            </div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-full ">
          <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
            <div class="text-lg font-semibold">19:30</div>
            <div class="text-sm text-slate-500">1h 19m</div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-full">
          <div class="p-4">
            <div class="m-4 grid grid-cols-3 content-center">
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
            </div>
          </div>
        </div>

        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-lg">
          <div class="p-4">
            <br />
            <button class="m-2 ml-10 w-full font-semibold text-slate-500">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
          </div>
        </div>
      </div>

      <div class="m-2 grid grid-cols-5 content-center gap-4 px-4">
        <!-----------------Parte superior-------------------->
        <div class="rounded-lg bg-slate-200">
          <div class="p-4 tracking-wide">
            <div class="flex flex-row space-x-1">
              <svg "width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.00967 5.12761H11.0097C12.1142 5.12761 13.468 5.89682 14.0335 6.8457L16.5089 11H21.0097C21.562 11 22.0097 11.4477 22.0097 12C22.0097 12.5523 21.562 13 21.0097 13H16.4138L13.9383 17.1543C13.3729 18.1032 12.0191 18.8724 10.9145 18.8724H8.91454L12.4138 13H5.42485L3.99036 15.4529H1.99036L4.00967 12L4.00967 11.967L2.00967 8.54712H4.00967L5.44417 11H12.5089L9.00967 5.12761Z"fill="currentColor"/>
              </svg>
              <h1 class="font-semibold">REGRESO</h1>
            </div>
            <p class="font-semibold text-slate-500">2022</p>
            <p class="text-slate-500">mie. 2 abr</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg hover:bg-slate-300">
          <div class="p-4">
            <h1 class="font-semibold">CTG</h1>
            <p class="text-slate-500">Cartagena de Indias</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg hover:bg-slate-300">
          <div class="p-4">
            <h1 class="font-semibold">PEI</h1>
            <p class="text-slate-500">Pereira</p>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="rounded-lg mt-6 ml-4">
          <div class="p-4">
            <p class="text-slate-500">Equipaje</p>
          </div>
        </div>
      </div>
      <div class="m-2 grid grid-cols-5 content-center gap-4 rounded-full px-4 hover:outline outline-1 outline-purple-600">
        <!-----------------Parte inferior-------------------->
        <div class="hover:bg-slate-300x rounded-full">
          <div class="m-4 p-4 tracking-wide">
            <div class="form-check">
              <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 appearance-none rounded-full border border-gray-300 bg-white align-top transition duration-200 checked:border-slate-600 checked:bg-blue-600 focus:outline-none" type="radio" unchecked />
              <label class="form-check-label inline-block text-slate-800"> Bon voyage </label>
            </div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x max-w-sm rounded-full">
          <div class="p-4 tracking-wide mt-4">
            <div class="flex items-centerx flex-row space-x-10">
              <div class="text-lg font-semibold">17:30</div>
            </div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-full">
          <div class="p-4 tracking-wide flex flex-row space-x-10 mt-4">
            <div class="text-lg font-semibold">19:30</div>
            <div class="text-slate-500">1h 19m</div>
          </div>
        </div>
        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-full">
          <div class="p-4">
            <div class="m-4 grid grid-cols-3 content-center">
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
              <div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path class="text-slate-500" d="M14 11H10V13H14V11Z" fill="currentColor" />
                  <path class="text-slate-500" fill-rule="evenodd" clip-rule="evenodd" d="M7 5V4C7 2.89545 7.89539 2 9 2H15C16.1046 2 17 2.89545 17 4V5H20C21.6569 5 23 6.34314 23 8V18C23 19.6569 21.6569 21 20 21H4C2.34314 21 1 19.6569 1 18V8C1 6.34314 2.34314 5 4 5H7ZM9 4H15V5H9V4ZM4 7C3.44775 7 3 7.44769 3 8V14H21V8C21 7.44769 20.5522 7 20 7H4ZM3 18V16H21V18C21 18.5523 20.5522 19 20 19H4C3.44775 19 3 18.5523 3 18Z" fill="currentColor" />
                </svg>
              </div>
            </div>
          </div>
        </div>

        <!-------------------------------------------------->
        <div class="hover:bg-slate-300x rounded-lg">
          <div class="p-4">
            <br />
            <button class="m-2 ml-10 w-full font-semibold text-slate-500">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-------------------------Precios----------------------------------->
    <div class="p-4">
      <h1 class="text-right text-slate-600">Precio por adulto</h1>
      <h1 class="text-right text-2xl text-slate-600">$ 200.000</h1>
      <div class="grid grid-cols-2 content-center gap-2">
        <div class="text-left text-sm text-slate-500">1 Adulto</div>
        <div class="text-right text-sm text-slate-500">$ 200.000</div>

        <div class="text-left text-sm text-slate-500">Impuesto, tasas y cargos</div>
        <div class="text-right text-sm text-slate-500">$ 68.000</div>

      </div>

      <hr class="mt-2" />

      <div class="mt-10 grid grid-cols-2 content-center gap-2">
        <div class="text-left text-lg text-slate-600">
          <strong> Precio final </strong>
        </div>
        <div class="text-right text-lg text-slate-600">
          <strong>$ 268.000 </strong>
        </div>
      </div>
      <button class="m-2 w-full rounded-full bg-blue-600 p-2 font-semibold text-white">Comprar</button>
    </div>
  </div>

</div>
