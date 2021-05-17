<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
    </x-slot>

    <x-jet-authentication-card>

        <x-slot name="logo">
<!--no lo saco por que explota //TODO:reemplazar el componente-->
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('pedidoRegister') }}">
            @csrf
            
                <div class="flex-row rounded-t">
                <div class="bg-green-400 px-2 rounded ">
                            <h3 class="bg-yellow-200 font-bold p-1 mt-4 -mx-2 rounded">Estado</h3>
                    <div class="mt-4 flex-col">
                        <select id="estado" name="estado" required class="mb-3 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="0" selected disabled>Seleccione un estado</option>
                            <option value="1" class="bg-yellow-100">Preparacion</option>
                            <option value="2" class="bg-yellow-300">In Transit</option>
                            <option value="3" class="bg-green-600 text-gray-50">Entregado</option>
                        </select>
                    </div>
                    </div>
                    <div class="bg-green-400 p-2 pt-0 rounded-t ">
                        <h3 class="bg-yellow-200 font-bold p-1 mb-4 -mx-2 rounded-t">Empresa // Responsable  <a href="{{route('usersCreate')}}" class="bg-green-500 text-gray-50 rounded px-2 m-1"> + </a> </h3>
                        <div class="mt-4 pt-4 inline">
                        <select  id="user_id" name="user_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                            <option selected disabled>Elija una Empresa // Responsable</option>
                            @forelse($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->business}} // {{$usuario->name}}</option>
                            @empty<option disabled value="-1">Sin usuarios</option>
                            @endforelse
                        </select>
                        </div>
                        <div class="mt-4 flex-col">
                        <x-jet-label for="pedido_nro" value="{{ __('Numero de pedido') }}" />
                        <x-jet-input id="pedido_nro" class="block mt-1 w-full" type="number" name="pedido_nro" min="0" step="1" :value="old('pedido_nro', $nextnumber)" required />
                </div>

                <div class="mt-4 flex-col">
                        <x-jet-label for="semana_salida" value="{{ __('Semana de Salida') }}" />
                        <x-jet-input id="semana_salida" class="block mt-1 w-full" type="week" name="semana_salida" :value="old('semana_salida', date('Y').'-W'.date('W'))"  required />
                </div>
                    </div>
                </div>


                <div class="flex-row mt-2 ">

                    <div class="bg-green-200 px-2 pb-4 rounded ">
                    <h3 class="bg-yellow-200 font-bold p-1 -m-2 rounded">Agencia</h3>
                    
                    <div class="mt-4 flex-col">
                        <x-jet-label for="agencia" value="{{ __('Agencia') }}" />
                        <x-jet-input id="agencia" class="block mt-1 w-full" type="text" name="agencia" :value="old('agencia')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="despachante" value="{{ __('Despachante') }}" />
                        <x-jet-input id="despachante" class="block mt-1 w-full" type="text" name="despachante" :value="old('despachante')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="consolidacion" value="{{ __('Lugar de consolidacion') }}" />
                        <x-jet-input id="consolidacion" class="block mt-1 w-full" type="text" name="consolidacion" :value="old('consolidacion')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="destino" value="{{ __('Destino') }}" />
                        <x-jet-input id="destino" class="block mt-1 w-full" type="text" name="destino" :value="old('destino')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="contenedores" value="{{ __('Contenedores') }}" />
                        <x-jet-input id="contenedores" class="block mt-1 w-full" type="number" min="1" name="contenedores" :value="old('contenedores')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                        <x-jet-input id="descripcion" class="block mt-1 w-full" type="text" rows="3" name="descripcion" :value="old('descripcion')" required />
                    </div>

                    <div class="mt-4 flex-col">
                        <x-jet-label for="fecha_cortedocumental" value="{{ __('Fecha de corte documental') }}" />
                        <x-jet-input id="fecha_cortedocumental" class="block mt-1 w-full" type="date" name="fecha_cortedocumental" :value="old('fecha_cortedocumental', date('Y-m-d'))" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="fecha_cortefisico" value="{{ __('Fecha de corte fisico') }}" />
                        <x-jet-input id="fecha_cortefisico" class="block mt-1 w-full" type="date" name="fecha_cortefisico" :value="old('fecha_cortefisico', date('Y-m-d'))" required />
                    </div>
                    </div>

                    <!-- Barco -->
                    
                    <div class="bg-green-300 px-2 rounded pb-4">
                            <h3 class="bg-yellow-200 font-bold p-1  mt-4 -mx-2 rounded">Barco</h3>
                    <hr>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_nom bre" value="{{ __('Nombre del Barco') }}" />
                        <x-jet-input id="barco_nombre" class="block mt-1 w-full" type="text" name="barco_nombre" :value="old('barco_nombre')" required />
                    </div>
                    <div class="mt-4 flex-col">
                        <x-jet-label for="barco_contenedores" value="{{ __('Cantidad de contenedores') }}" />
                        <x-jet-input id="barco_contenedores" class="block mt-1 w-full" type="number" min="1" name="barco_contenedores" :value="old('barco_contenedores')" required />
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
                        <x-jet-input id="fecha_destino"  class="block mt-1  w-full" type="date" name="fecha_destino" :value="old('fecha_destino', date('Y-m-d'))" required />
                    </div>
                    </div>
                    
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

    </script>
</x-app-layout>
