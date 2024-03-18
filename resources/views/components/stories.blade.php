<div class="flex flex-col items-center justify-center pt-24">
  <div class="max-w-[1140px] relative flex flex-col justify-center items-center self-center gap-4">
    <x-title text="NOTÍCIAS"/>

    <div class="grid grid-cols-1 gap-4">
      @foreach($stories as $story)
        <div class="bg-white p-4 shadow-md rounded-md">
          <h3 class="text-lg font-semibold">{{ $story->title }}</h3>
          <!-- Print other details of the story if needed -->
        </div>
      @endforeach
    </div>
  </div>  
</div>
