<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de usuario nuevo') }}
        </h2>
    </x-slot>

    <x-jet-authentication-card>

        <x-slot name="logo">
            <div class="mt-8">
                <x-jet-authentication-card-logo />
            </div>
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('usersRegister') }}">
            @csrf
            <div>
                <div class="flex-row">
                    <div>
                        <x-jet-label for="business" value="{{ __('Empresa') }}" />
                        <select id="user_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @forelse($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                            @empty
                                <option disabled value="-1">Sin usuarios</option>
                            @endforelse
                        </select>
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
                <div class="mt-4">
                    <x-jet-label for="is_admin">
                        <div class="flex items-center justify-center">
                            <x-jet-checkbox name="is_admin" id="is_admin"/>
                            <div class="ml-2">
                                {!! __('¿ Este usuario debe ser ADMIN ?') !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-jet-button >
                        {{ __('Registrar Nuevo Usuario') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
