<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administracion de pedidos: ') }}<a href="/pedidos/index/1" class="hover:text-green-600 hover:underline"> <p class="inline @if($operacion == 'Todos') text-green-800 underline @endif " >Todos</p></a> | <a href="/pedidos/index/0" class="hover:text-green-600 hover:underline"> <p class="inline @if($operacion == 'Activos') text-green-800 underline @endif ">Activos</p></a> | <a href="/pedidos/index/2" class="hover:text-red-600  hover:underline"> <p class="inline @if($operacion == 'Eliminados') text-red-800 underline @endif ">Eliminados</a>
        </h2>
    </x-slot>
    @if($message != '')
    <livewire:alert.message :message="$message" />
    @endif

    <div class="h-auto flex mt-8 px-4">

        <a href="/pedidos/create" class="p-1 mr-4 bg-green-800 text-green-200 rounded-full flex align-middle"><button ><i class="fas fa-plus"></i></button></a>

        <div class='overflow-x-auto w-full'>

            <!-- Tabla: Inicio -->
            <table class='mx-auto max-w-5xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Usuario<br>Empresa
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Contacto
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Estado
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Rol
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">

                    </th>
                </tr>
                </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data -->
                @forelse($data as $pedido)
                <tr class="sm:cursor-pointer sm:select-none md:select-auto">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3 max-w-md overflow-auto">
                            <div class="inline-flex w-10 h-10">
                                <img loading="lazy" class='w-10 h-10 object-cover rounded-full' alt='IMG' src='/storage/logozam.svg' >
                            </div>
                            <div>
                                <p class="">
                                    {{$pedido->name}}
                                </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                    {{$pedido->business}}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4" >
                        <p class="">
                            <i class="fas fa-phone"></i> {{ $pedido->phone}}
                        </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            <i class="fas fa-envelope"></i> {{ $pedido->email}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($pedido->deleted_at == null)
                        <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                            Activo
                        </span>
                        @else
                        <span class="text-red-200 bg-red-800 font-semibold px-2 rounded-full">
                            Eliminado
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($pedido->is_admin)
                            Admin
                        @else
                        Cliente
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form id="edit__{{$pedido->id}}" action="{{url('/users/edit/'.$pedido->id)}}" method="GET" class="inline">@csrf <button class="bg-blue-800 text-blue-200   font-semibold px-2 rounded-l-full  ">Editar</button></form>
                        @if(!$pedido->trashed())
                            @if(\Illuminate\Support\Facades\Auth::user()->id != $pedido->id)
                            <form id="delete_{{$pedido->id}}" action="{{url('/users/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-red-800 text-red-200   font-semibold px-2 rounded-r-full  ">Eliminar</button></form>
                            @endif
                            @else
                            <form id="reactivate_{{$pedido->id}}" action="{{url('/users/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-yellow-800 text-yellow-200   font-semibold px-2 rounded-r-full  ">Reactivar</button></form>
                        @endif
                    </td>
                </tr>
                @empty
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
