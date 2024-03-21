<x-app-layout>
  <div class="flex flex-col items-center justify-center py-12 px-4 lg:px-0">
    <x-title text="CORRIDAS"/>
  
    <div class="max-w-[1140px] w-full flex flex-wrap justify-between items-center self-center pt-8 drop-shadow-lg">

      @foreach($races as $race)
      <div class="bg-white flex flex-col justify-between gap-4 py-6 px-6 rounded-lg shadow-xl">
        <h1 class="font-bold text-center text-xl">{{ $race->title }}</h1>
              
        <div class="w-96">
          <img class="w-full rounded-md" src={{$race->image_path}} alt="">
          @foreach($race->editions as $edition)
            <h2 class="font-[400] text-center text-lg my-3">Edição: {{ $edition->edition }}</h2>

            <a class="w-full h-full" href="{{ route('race', ['name' => $race->name]) }}">
              <x-new-button>VER DETALHES</x-new-button>
            </a>
          @endforeach
        </div>
      </div>
    @endforeach
    </div>  
  </div>
</x-app-layout>
