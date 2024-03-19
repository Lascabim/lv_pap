<x-app-layout>
  <div class="py-12">
    <div class="sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-1 justify-between items-center gap-4">
        @foreach($races as $race)
          <h1>{{ $race->name }}</h1>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
