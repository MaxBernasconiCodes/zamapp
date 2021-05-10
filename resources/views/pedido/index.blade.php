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


        <div class='overflow-x-auto w-full'>

            <!-- Tabla: Inicio -->
            <table class='mx-auto max-w-7xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <caption class="p-1 mr-4 bg-green-800 text-green-200 rounded-t w-full"><a href="/pedidos/create" class="rounded-t w-full" ><button class="w-full rounded-t" ><i class="fas fa-plus  "></i></button></a><caption>

                    <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        N° pedido<br>Semana de Salida
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Empresa
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
                </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data -->
                @forelse($data as $pedido)
                    <livewire:pedido-row-admin :pedido="$pedido"/>
                @empty
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
