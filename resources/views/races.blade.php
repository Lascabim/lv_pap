{{-- {{ dd($races) }} --}}

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Races') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-1 justify-between items-center gap-4">
        @foreach($races as $race)
          <div class="sm:rounded-lg bg-blue-400 w-96 h-96">
            <h1 class="font-bold text-center py-2">{{ $race->name }}</h1>
            <div class="relative">
              <img src="{{ $race->image_path }}" alt="race image" class="w-full h-56 bg-slate-700">

              {{-- TOP LEFT ICONS --}}
              <div class="absolute ml-2 mt-2 top-0 left-0 flex flex-col gap-4">
                <a target="_blank" href="{{$race->gps_url}}">
                  <button class="bg-white h-[30px] w-[30px] rounded-full flex items-center justify-center"> 
                    <i class="fa-regular fa-map scale-110 hover:scale-125 transition-all duration-75"></i>
                  </button>
                </a> 
                @if ($race->has_accessibility) 
                  <a href="{{ route('faq/visibility') }}">
                    <button class="bg-white h-[30px] w-[30px] rounded-full flex items-center justify-center"> 
                      <i class="fa-regular fa-eye scale-110 hover:scale-125 transition-all duration-75"></i>
                    </button>
                  </a> 
                @else
                  <a href="{{ route('faq/visibility') }}">
                    <button class="bg-white h-[30px] w-[30px] rounded-full flex items-center justify-center"> 
                      <i class="fa-regular fa-eye scale-110 hover:scale-125 transition-all duration-75"></i>
                    </button>
                  </a> 
                @endif
                  <a href="{{ route('faq/condition') }}">
                    <button class="bg-white h-[30px] w-[30px] rounded-full flex items-center justify-center"> 
                      <i class="fa-regular fa-heart scale-110 hover:scale-125 transition-all duration-75"></i>
                    </button>
                  </a> 
              </div>
  
              {{-- TOP RIGHT ICONS --}}
              <div class="absolute mr-2 mt-2 top-0 right-0 flex flex-col">
                <a href="{{$race->url}}">
                    <button class="bg-white h-[30px] w-[30px] rounded-full flex items-center justify-center"> 
                      <i class="fa-regular fa-share-from-square scale-110 hover:scale-125 transition-all duration-75"></i>
                  </button>
                </a> 
            </div>

              {{-- BOTTOM RIGHT ICONS --}}
              <div class="absolute mr-2 mb-2 bottom-0 right-0 flex flex-col">
                <button class="bg-white px-3 rounded flex items-center justify-center"> 
                  {{$race->date}}
                </button>
              </div>
            </div>

            <div>
              <p class="ml-2 py-1 px-1">Name: {{$race->name}}</p>
              <p class="ml-2 py-1 px-1">Description: {{$race->description}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
