<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-0">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

                {{-- <div class="mt-4">                
                    <x-label for="condition" value="{{ __('Condition') }}" />

                    <x-select id="condition" name="condition" class="block mt-1 w-full"/>
                        <option selected value="basic">Basic ( 1 - 5 Km)</option>
                        <option value="medium">Medium ( 5 - 10 Km)</option>
                        <option value="advanced">Advanced ( More than 10 Km)</option>
                    </select>
                </div>

                <div class="mt-4">                
                    <x-label for="location" value="{{ __('Location') }}" />

                    <x-select id="location" name="location" class="block mt-1 w-full"/>
                        <option value="aveiro">Aveiro</option>
                        <option value="beja">Beja</option>
                        <option value="braga">Braga</option>
                        <option value="braganca">Bragança</option>
                        <option value="castelo_branco">Castelo Branco</option>
                        <option value="coimbra">Coimbra</option>
                        <option value="evora">Évora</option>
                        <option value="faro">Faro</option>
                        <option value="guarda">Guarda</option>
                        <option value="leiria">Leiria</option>
                        <option value="lisbon">Lisbon</option>
                        <option value="portalegre">Portalegre</option>
                        <option value="porto" selected>Porto</option>
                        <option value="santarem">Santarém</option>
                        <option value="setubal">Setúbal</option>
                        <option value="viana_do_castelo">Viana do Castelo</option>
                        <option value="vila_real">Vila Real</option>
                        <option value="viseu">Viseu</option>
                    </select>
                </div>

                <div class="mt-4">                
                    <x-label for="gender" value="{{ __('Gender') }}" />

                    <x-select id="gender" name="gender" class="block mt-1 w-full"/>
                        <option selected value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div> --}}

            <div class="mt-4">
                <div class="flex items-center">
                    <x-checkbox name="is_visual" id="is_visual"/>

                    <x-label for="is_visual" class="ml-2" value="{{ __('Do you have visual problems?') }}" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <x-secondary-button>
                    <a href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        Retornar
                    </a>
                </x-secondary-button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
