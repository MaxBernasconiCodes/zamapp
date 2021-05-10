<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
    </x-slot>

    <x-jet-authentication-card>

        <x-slot name="logo">
            <div class="mt-8">
                <x-jet-authentication-card-logo />
            </div>
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('pedidoRegister') }}">
            @csrf

                <div class="flex-row rounded-t">
                    <div class="bg-green-400 p-2 pt-0 rounded-t ">
                        <h3 class="bg-yellow-200 font-bold p-1 mb-4 -mx-2 rounded-t">Empresa</h3>
                        <div class="mt-4 pt-4 inline">
                        <select  onchange="asignarResponsable()" id="user_id" class="  w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                            @forelse($usuarios as $usuario)
                            <option value="{{$usuario->name}}">{{$usuario->business}}</option>
                            @empty<option disabled value="-1">Sin usuarios</option>
                            @endforelse
                        </select>
                        </div>
                        <div class="mt-4 flex-col block border-2 rounded p-2 w-full bg-white">
                            <label for="business"> Responsable: </label>
                            <label id="business" class="w-max" name="business"></label>
                        </div>
                    </div>
                </div>


                <div class="flex-row mt-2 ">

                    <div class="bg-green-200 px-2 rounded ">
                    <h3 class="bg-yellow-200 font-bold p-1 -m-2 rounded">Agencia</h3>
                    <hr>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="agencia" value="{{ __('Agencia') }}" />
                        <x-jet-input id="agencia" class="block mt-1 w-full" type="text" name="agencia" :value="old('agencia')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="despachante" value="{{ __('Despachante') }}" />
                        <x-jet-input id="despachante" class="block mt-1 w-full" type="text" name="despachante" :value="old('despachante')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="consolidacion" value="{{ __('Consolidacion') }}" />
                        <x-jet-input id="consolidacion" class="block mt-1 w-full" type="text" name="consolidacion" :value="old('consolidacion')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="destino" value="{{ __('Destino') }}" />
                        <x-jet-input id="destino" class="block mt-1 w-full" type="text" name="destino" :value="old('destino')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="contenedores" value="{{ __('Contenedores') }}" />
                        <x-jet-input id="contenedores" class="block mt-1 w-full" type="text" name="contenedores" :value="old('contenedores')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                        <x-jet-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="pedido_nro" value="{{ __('Numero de pedido') }}" />
                        <x-jet-input id="pedido_nro" class="block mt-1 w-full" type="text" name="pedido_nro" :value="old('pedido_nro')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="semana_salida" value="{{ __('Semana de Salida') }}" />
                        <x-jet-input id="semana_salida" class="block mt-1 w-full" type="week" name="semana_salida" :value="old('semana_salida')"  required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="fecha_cortedocumental" value="{{ __('Fecha de corde documental') }}" />
                        <x-jet-input id="fecha_cortedocumental" class="block mt-1 w-full" type="date" name="fecha_cortedocumental" :value="old('fecha_cortedocumental')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="fecha_cortefisico" value="{{ __('Fecha de corte fisico') }}" />
                        <x-jet-input id="fecha_cortefisico" class="block mt-1 w-full" type="date" name="fecha_cortefisico" :value="old('fecha_cortefisico')" required />
                    </div>
                        <div class="bg-green-300 px-2 rounded ">
                            <h3 class="bg-yellow-200 font-bold p-1 mt-4 -mx-2 rounded">Barco</h3>
                    <hr>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_nombre" value="{{ __('Nombre del Barco') }}" />
                        <x-jet-input id="barco_nombre" class="block mt-1 w-full" type="text" name="barco_nombre" :value="old('barco_nombre')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_contenedores" value="{{ __('Numero de contenedores') }}" />
                        <x-jet-input id="barco_contenedores" class="block mt-1 w-full" type="text" name="barco_contenedores" :value="old('barco_contenedores')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_nro_contenedor" value="{{ __('Nro de Contenedor') }}" />
                        <x-jet-input id="barco_nro_contenedor" class="block mt-1 w-full" type="text" name="barco_nro_contenedor" :value="old('barco_nro_contenedor')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_nro_remito" value="{{ __('Nro de Remito') }}" />
                        <x-jet-input id="barco_nro_remito" class="block mt-1 w-full" type="text" name="barco_nro_remito" :value="old('barco_nro_remito')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_nro_booking" value="{{ __('Nro booking') }}" />
                        <x-jet-input id="barco_nro_booking" class="block mt-1 w-full" type="text" name="barco_nro_booking" :value="old('barco_nro_booking')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="fecha_destino" value="{{ __('Fecha de Destino') }}" />
                        <x-jet-input id="fecha_destino" class="block mt-1 w-full" type="text" name="fecha_destino" :value="old('fecha_destino')" required />
                    </div>
                    </div>
                        <div class="bg-green-400 px-2 rounded ">
                            <h3 class="bg-yellow-200 font-bold p-1 mt-4 -mx-2 rounded">Estado</h3>
                    <hr>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="estado" value="{{ __('Estado') }}" />
                        <x-jet-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')" required />
                    </div>
                    </div>
                    <br>
                    <hr>
                </div>
            </div>
            <hr class="border-b-2 mt-4">

            <div class="flex-row">
                <div class="flex items-center justify-center mt-4">
                    <x-jet-button >
                        {{ __('Registrar Pedido') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </x-jet-authentication-card>

    <script>
        function asignarResponsable() {
            var responsable = document.getElementById("user_id").value;
            document.getElementById("business").innerHTML = responsable;
        }
    </script>
</x-app-layout>
