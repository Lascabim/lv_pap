<x-app-layout>
  <div class="flex flex-col items-center justify-center pt-12 px-4 lg:px-0">
      <x-title text="{{ $race->title }}"/>

      <div class="max-w-[1140px] w-full flex flex-wrap justify-center items-center self-center py-8 drop-shadow-lg">
          <div class="bg-white flex flex-col justify-between gap-4 py-6 px-6 rounded-lg shadow-xl">
              <div class="sm:w-[500px]">
                  <img class="w-full rounded-md" src="{{ $race->image_path }}" alt="">

                  @foreach($race->editions as $edition)
                      <div class="flex justify-around mb-6 font-bold">
                          <h2 class="flex items-center gap-2 font-[400] text-center text-lg capitalize"><i class="fa-solid fa-sliders"></i> Edição: <p class="font-bold">{{ $edition->edition }}</p></h2>
                          <h2 class="flex items-center gap-2 font-[400] text-center text-lg capitalize"><i class="fa-solid fa-earth-europe"></i> Distrito: <p class="font-bold">{{ $edition->district }}</p></h2>
                      </div>

                      <div class="flex flex-col gap-12"> 
                          @foreach($edition->details as $detail)
                          <div class="bg-gray-200 flex items-center gap-5 p-4 rounded-md shadow-sm">
                            <input type="radio" class="p-2 border-2 rounded-md border-stone-400 focus:border-blue-500" id="{{ $detail->id }}" name="detail_radio_group_{{ $edition->id }}">
                                  <div class="w-full">
                                      @php
                                          $type_translation = '';

                                          switch ($detail->type) {
                                              case 'kids':
                                                  $type_translation = 'Crianças';
                                                  break;
                                              case 'adults':
                                                  $type_translation = 'Adultos';
                                                  break;
                                              case 'seniors':
                                                  $type_translation = 'Idosos';
                                                  break;
                                              default:
                                                  $type_translation = $detail->type;
                                          }

                                          $accessibility_translation = '';
                                          $accessibility_translation = ($detail->has_accessibility == 1) ? 'Ativa' : 'Desativada';


                                          $condition_translation = '';
                                          switch ($detail->minimum_condition) {
                                              case 'beginner':
                                                  $condition_translation = 'Iniciante';
                                                  break;
                                              case 'experienced':
                                                  $condition_translation = 'Experiente';
                                                  break;
                                              case 'advanced':
                                                  $condition_translation = 'Avançado';
                                                  break;
                                              default:
                                                  $condition_translation = $detail->minimum_condition;
                                          }

                                          setlocale(LC_TIME, 'pt_PT.utf8');
                                      @endphp

                                      <p class="font-bold text-lg mb-3">Tipo de Corrida: {{ $type_translation }}</p>
                                      <p>Condição Mínima: {{ $condition_translation }}</p>
                                      <p>Horário:
                                          {{ date('H:i', strtotime($detail->start_time)) }}

                                          @if ($detail->end_time)
                                              - {{ date('H:i', strtotime($detail->end_time)) }}
                                          @endif
                                      </p>
                                      <p>
                                          Data:
                                          {{ strftime('%e de %B de %Y', strtotime($detail->date)) }}
                                      </p>
                                      <p>Acessibilidade: {{ $accessibility_translation }}</p>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  @endforeach
              </div>

            @if (Auth::check())
              <a href="{{ route('login') }}">
                <x-new-button>
                    INCREVER-ME
                </x-new-button>
              </a>
            @else
                <a href="{{ route('login') }}">
                    <x-new-button>
                        INICIAR SESSÃO
                    </x-new-button>
                </a>
            @endif
          </div>
      </div>
  </div>
</x-app-layout>
