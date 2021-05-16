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
        <livewire:searchbar></livewire:searchbar> 
        

    </div> 
    <div>
    <div>
        <?php echo $data->render(); ?>
        </div>
    </div>
        

       
     
    </x-slot>  
    
    <div class="h-auto flex mt-8 px-4">
        <div class='overflow-x-auto w-full'>

        <!-- Tabla: Inicio -->
        <table class='mx-auto max-w-7xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <span class="p-1 mr-4 bg-green-800 text-green-200 font-bold  text-center rounded-t w-full"><a href="{{route('pedidoCreate')}}" class="rounded-t w-full" ><button class="w-full rounded-t" > + Agregar  </button></a><span>

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
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Acciones
                    </th>
                </tr>
                <form action="{{route('filterPedidos')}}" method="GET" id="search" name="search">
                <tr>
                <td>
                    <input type="week" id="semana_salida" name="semana_salida">
                </td>
                <td>                        
                    <select id="user_id" name="user_id">
                        <option disabled selected>Elija un cliente</option>
                        @forelse($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->business}}</option>
                        @empty
                        <option disabled >Sin registros</option>
                        @endforelse
                    </select>
                    </td>
                <td></td>
                <td>             
                    <select id="estado" name="estado" required class="mb-3 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="0" selected disabled>Seleccione un estado</option>
                            <option value="1" class="bg-yellow-100">Preparacion</option>
                            <option value="2" class="bg-yellow-300">In Transit</option>
                            <option value="3" class="bg-green-600 text-gray-50">Entregado</option>
                    </select>
                </td>
                <td><input type="submit" class="rounded bg-green-800 mb-4 p-2 text-gray-50 w-full" value="Filtrar"></td>
                </tr>
                </form>
            </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data -->
                @forelse($data as $pedido)
                    <livewire:pedido-row-admin :pedido="$pedido" :usuarios="$usuarios"/>
                @empty
                @endforelse
                </tbody>
            </table>
            

        </div>
    </div>
</x-app-layout>
