<form wire:submit.prevent="save">
  <div class="mt-0 flex items-center gap-3">
    <div class="w-full">
      <x-label for="name" value="{{ __('Name:') }}" />
      <x-input id="name" class="block mt-1 w-full" type="text" name="name" required/>
    </div>

    <div class="w-full">
      <x-label for="minimum_condition" value="{{ __('Minimum Condition:') }}" />
      <x-input id="minimum_condition" class="block mt-1 w-full" type="text" name="minimum_condition" required/>
    </div>
  </div>

  <div class="mt-4">
    <x-label for="description" value="{{ __('Description:') }}" />
    <x-input id="description" class="block mt-1 w-full" type="text" name="description" required/>
  </div>

  <div class="mt-4">
    <x-label for="slug" value="{{ __('Slug:') }}" />
    <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" required/>
  </div>

  <div class="mt-4">
    @if ($photo)
      Photo Preview:
      <img class="m-0" src="{{ $photo->temporaryUrl() }}">
    @endif

    <input class="hidden" type="file" id="fileInput" wire:model="photo">
    <label for="fileInput">
      Click here to Upload Image
    </label>
  </div>

  <div class="mt-4 flex items-center gap-3">
    <div class="w-full">
      <x-label for="latitude" value="{{ __('Latitude:') }}" />
      <x-input id="latitude" class="block mt-1 w-full" type="text" name="latitude" required/>
    </div>

    <div class="w-full">
      <x-label for="longitude" value="{{ __('Longitude:') }}" />
      <x-input id="longitude" class="block mt-1 w-full" type="text" name="longitude" required/>
    </div>
  </div>

  <div class="mt-4 flex tele:flex-col items-center gap-3">
    <div class="w-full">
      <x-label for="date" value="{{ __('Date:') }}" />
      <x-input id="date" class="block mt-1 w-full" type="date" name="date" required/>
    </div>

    <div class="w-full">
      <x-label for="start_time" value="{{ __('Start Time:') }}" />
      <x-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" required/>
    </div>
  
    <div class="w-full">
      <x-label for="end_time" value="{{ __('End Time:') }}" />
      <x-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" required/>
    </div>
  </div>

  <div class="flex items-center mt-4">
    <x-input id="isBlind" class="mr-1" type="checkbox" name="isBlind" value="true"/>
    <x-label for="isBlind" value="{{ __('Has accessibility to blind people?') }}" />
  </div>

  <button type="submit">SUBMIT</button>
</form>
