<x-app-layout>
    <x-slot name="header">
    @if($message != '')
    <livewire:alert.message :message="$message" :color='"green"' />
    @endif

    <div style="display: flex; justify-content:space-between; align-items:center">
        <div>
            {{ __('Administracion de pedidos: ') }}
            <a href="{{route('pedidoIndex')}}/1" class="hover:text-green-600 hover:underline"> 
                <p class="inline @if($operacion == 'Todos') text-green-800 underline @endif " >Todos</p></a> | 
            <a href="{{route('pedidoIndex')}}/0" class="hover:text-green-600 hover:underline"> 
                <p class="inline @if($operacion == 'Activos') text-green-800 underline @endif ">Activos</p></a> | 
            <a href="{{route('pedidoIndex')}}/2" class="hover:text-red-600  hover:underline"> 
                <p class="inline @if($operacion == 'Eliminados') text-red-800 underline @endif ">Eliminados</a>
        </div>     

    </div> 
    <div>
    </div>
        

       
     
    </x-slot>  
    
    <div class="h-auto flex mt-8 px-4">
        <div class='overflow-x-auto w-full'>

        <!-- Tabla: Inicio -->
        <div class="float-right relative right-1 ">
        
        </div>
        <table class='mx-auto max-w-8xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
        
            <thead class="bg-gray-50">
                @csrf
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        N° pedido<br>Semana de Salida<br>
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Empresa <br>
                        Responsable

                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Barco<br>N°Contenedor
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Estado

                    </th>
                    <th class="font-semibold">
                    @livewire('addbutton', ['href' => route('pedidoCreate')])
                    </th>
                </tr>
                <form action="{{route('filterPedidos')}}" method="GET" id="search" name="search">
                <tr>
                <td>
                    <input type="week" id="semana_salida" name="semana_salida" @if(!is_null($filtros['semana_salida'])) value={{$filtros['semana_salida']}} @endif >
                </td>
                <td>                        
                    <select id="user_id" name="user_id">
                        <option disabled @if($filtros['user_id'] == null) selected @endif >Elija un cliente</option>
                        @forelse($clientes as $cliente)
                        <option value="{{$cliente->id}}" @if(!is_null($filtros['user_id']) && $filtros['user_id'] == $cliente->id) selected @endif >{{$cliente->business}}</option>
                        @empty
                        <option disabled >Sin registros</option>
                        @endforelse
                    </select>
                    </td>
                <td></td>
                <td>             
                    <select id="estado" name="estado" required class="mb-3 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option disabled @if(is_null($filtros['estado'])) selected @endif >Seleccione un estado</option>
                            <option value="1" @if($filtros['estado'] == 1) selected @endif class="bg-yellow-100">Preparacion</option>
                            <option value="2" @if($filtros['estado'] == 2) selected @endif class="bg-yellow-300">In Transit</option>
                            <option value="3" @if($filtros['estado'] == 3) selected @endif class="bg-green-600 text-gray-50">Entregado</option>
                    </select>
                </td>
                <td><input type="submit" class="rounded bg-green-800 mb-4 p-2 text-green-50 w-1/2" value="Filtrar">
                    <a  href="{{route('pedidoIndex')}}" class="rounded bg-gray-800 mb-4 p-2 text-gray-50 w-1/2" value="Limpiar">Resetear</a></td>
                </tr>
                </form>
            </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data  -->
                 @forelse($data as $pedido)
                    <livewire:pedido-row-admin :pedido="$pedido" :usuarios="$usuarios" :clientes="$clientes"/>
                @empty
                @endforelse
                </tbody>
            </table>
            <div class="flex justify-center align-middle  p-1">
                 <?php echo $data->render(); ?>
                </div>
            

        </div>
    </div>
</x-app-layout>
