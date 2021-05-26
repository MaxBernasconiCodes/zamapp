<x-app-layout>
    <x-slot name="header">
    <div style="display: flex; justify-content:space-between; align-items:center">
    @if(Auth::user()->is_admin == 1)
        <div>
            {{ __('Administracion de pedidos: ') }}
                <a href="{{route('pedidoIndex')}}/1" class=" border-transparent  hover:text-zam-green hover:rounded-lg   
                @if($operacion == 'Todos') text-zam-green bg-zam-dark border  rounded-lg @endif p-2" >Todos</a>  
                <a href="{{route('pedidoIndex')}}/0" class=" border-transparent  hover:text-zam-green   hover:rounded-lg  
                @if($operacion == 'Activos') text-zam-green bg-zam-dark border  rounded-lg @endif p-2" >Activos</a>  
                <a href="{{route('pedidoIndex')}}/2" class=" border-transparent  hover:text-zam-green   hover:rounded-lg   
                @if($operacion == 'Eliminados') text-zam-green bg-zam-dark border  rounded-lg @endif p-2">Eliminados</a>
        </div> 
    @else
    <div>
            {{ __('Sus Pedidos') }}
    </div>
    @endif    

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
                    @if(Auth::user()->is_admin == 1)
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Empresa <br>
                        Responsable
                    @endif
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Barco<br>N°Contenedor
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Estado

                    </th>
                   
                    <th class="font-semibold ">
                    <div class="p-6">
                    @if(Auth::user()->is_admin == 1)
                    @livewire('addbutton', ['href' => route('pedidoCreate')])
                    @endif
                    </div>
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
                        <option value="{{$cliente->id}}" @if(!is_null($filtros['user_id']) && $filtros['user_id'] == $cliente->id) selected @endif >{{$cliente->business}} // {{$cliente->name}}</option>
                        @empty
                        <option disabled >Sin registros</option>
                        @endforelse
                    </select>
                    </td>
                    @if(Auth::user()->is_admin == 1)
                <td></td>
                @endif
                <td>             
                    <select id="estado" name="estado" required class="mb-3 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option disabled @if(is_null($filtros['estado'])) selected @endif >Seleccione un estado</option>
                            <option value="1" @if($filtros['estado'] == 1) selected @endif class="bg-yellow-100">Preparacion</option>
                            <option value="2" @if($filtros['estado'] == 2) selected @endif class="bg-yellow-300">In Transit</option>
                            <option value="3" @if($filtros['estado'] == 3) selected @endif class="bg-green-600 text-gray-50">Entregado</option>
                    </select>
                </td>
                
                <td>
                <div class="flex justify-center align-center">
                    <button type="submit" class="rounded bg-green-800 mb-4 p-2 text-green-50 inline mr-2"> <svg  width="1.5rem" height="1.5rem" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" class="svg-inline--fa fa-filter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg> </button>
                    <a  href="{{route('pedidoIndex')}}" class="rounded flex bg-gray-800 mb-4 p-2 text-gray-50 w-max">Resetear </a>
                    
                </div>
                </td>
                </tr>
                

                </form>
            </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data  -->
                @if(Auth::user()->is_admin == 1)
                 @forelse($data as $pedido)
                    <livewire:pedido-row-admin :pedido="$pedido" :usuarios="$usuarios" :clientes="$clientes"/>
                @empty
                @endforelse
                @else

                @forelse($data as $pedido)
                <livewire:pedido-row-user :pedido="$pedido"/>
                @empty
                @endforelse
                @endif
                </tbody>
            </table>
            <div class="flex justify-center align-middle  p-1">
                 <?php echo $data->render(); ?>
                </div>
            

        </div>
    </div>
</x-app-layout>
