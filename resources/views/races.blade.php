<x-app-layout>
  <div class="py-12">
    <div class="sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-1 justify-around items-center gap-4">
        @foreach($races as $race)
          <div>
            <h1>{{ $race->title }}</h1>
                  
            <div>
              @foreach($race->editions as $edition)
                <li>Edition: {{ $edition->edition }}</li>

                @foreach($edition->details as $detail)
                  <div class="flex flex-row gap-5">
                    <li>Type: {{ $detail->type }}</li>
                    <p>Start Time: {{ $detail->start_time }}</p>
                  </div>
                @endforeach
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
