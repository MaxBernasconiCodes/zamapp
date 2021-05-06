<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="logo">
            <div class="mt-8">
            <x-jet-authentication-card-logo />
            </div>
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
<div>
    <div class="flex-row">
            <div>
                <x-jet-label for="business" value="{{ __('Empresa') }}" />
                <x-jet-input id="business" class="block mt-1 w-full" type="text" name="business" :value="old('business')" required autofocus autocomplete="business" />
            </div>
    </div>

            <hr class="border-b-2 mt-4">

    <div class="flex-row">
            <div class="mt-4 flex-col">
                <x-jet-label for="name" value="{{ __('Nombre de Responsable') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4 flex-col">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4 flex-col">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4 flex-col">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
    </div>

            <hr class="border-b-2 mt-4">

    <div class="flex-row">
            <div class="mt-4 flex-col">
                <x-jet-label for="phone" value="{{ __('Telefono') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autocomplete="phone" />
            </div>

            <div class="mt-4 flex-col">
                <x-jet-label for="adress" value="{{ __('Domicilio') }}" />
                <x-jet-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autocomplete="adress" />
            </div>

            <div class="mt-4 flex-col">
                <x-jet-label for="country" value="{{ __('Pais') }}" />
                <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autocomplete="country" />
            </div>
        <? //TODO cambiar country de input a select con la clase de paises ?>
    </div>
</div>
            <hr class="border-b-2 mt-4">

            <div class="flex-row">
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ir a Login') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar Nuevo Usuario') }}
                </x-jet-button>
            </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
