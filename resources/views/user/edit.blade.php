<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Usuario: {{ $user->name }}
            @if(!$user->trashed())
                @if(\Illuminate\Support\Facades\Auth::user()->id != $user->id)
                <form id="delete_{{$user->id}}" action="{{url('/users/delete/'.$user->id)}}" method="POST" class="inline"  >@csrf @method('DELETE') <button class="bg-red-800 text-red-200   font-semibold px-2 rounded-r-full  ">Eliminar</button></form>
                @endif
            @else
                <form id="reactivate_{{$user->id}}" action="{{url('/users/delete/'.$user->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-yellow-800 text-yellow-200   font-semibold px-2 rounded-r-full  ">Reactivar</button></form>
            @endif

        </h2>
    </x-slot>

    <x-jet-authentication-card>

        <x-slot name="logo">
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('usersModify',['id' => $user->id])}}">
            @csrf
            @method('PATCH')
            <div>
                <div class="flex-row">
                    <div>
                        <x-jet-label for="business" value="{{ __('Empresa') }}" />
                        <x-jet-input id="business" class="block mt-1 w-full" type="text" name="business" :value="old('business', $user->business)" required autofocus autocomplete="business" />
                    </div>
                </div>

                <hr class="border-b-2 mt-4">

                <div class="flex-row">
                    <div class="mt-4 flex-col">
                        <x-jet-label for="name" value="{{ __('Nombre de Responsable') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus autocomplete="name" />
                    </div>
                </div>

                <hr class="border-b-2 mt-4">

                <div class="flex-row">
                    <div class="mt-4 flex-col">
                        <x-jet-label for="phone" value="{{ __('Telefono') }}" />
                        <x-jet-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone' ,$user->phone)" required autocomplete="phone" />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="adress" value="{{ __('Domicilio') }}" />
                        <x-jet-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress',$user->adress)" required autocomplete="adress" />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="country" value="{{ __('Pais') }}" />
                        <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country',$user->country)" required autocomplete="country" />
                    </div>
                    <? //TODO cambiar country de input a select con la clase de paises ?>
                </div>
            </div>
            <hr class="border-b-2 mt-4">

            <div class="flex-row">
                <div class="mt-4">
                    <x-jet-label for="isadmin">
                        <div class="flex items-center justify-center">
                            <x-jet-checkbox name="is_admin" id="is_admin" :user="$user" />
                            <div class="ml-2">
                                {!! __('¿ Este usuario debe ser ADMIN ?') !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-jet-button >
                        {{ __('Modificar') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
