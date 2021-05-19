<x-app-layout>
    <x-slot name="header">
    @if($message != '')
    <livewire:alert.message :message="$message" />
    @endif

    <div style="display: flex; justify-content:space-between; align-items:center">
        <div>
            {{ __('Administracion de usuarios: ') }}
            <a href="{{route('userIndex')}}/1" class="hover:text-green-600 hover:underline"> 
                <p class="inline @if($operacion == 'Todos') text-green-800 underline @endif " >Todos</p></a> | 
            <a href="{{route('userIndex')}}/0" class="hover:text-green-600 hover:underline"> 
                <p class="inline @if($operacion == 'Activos') text-green-800 underline @endif ">Activos</p></a> | 
            <a href="{{route('userIndex')}}/2" class="hover:text-red-600  hover:underline"> 
                <p class="inline @if($operacion == 'Eliminados') text-red-800 underline @endif ">Eliminados</a>
        </div>     

    </div> 
    </x-slot>


    <div class="h-auto flex mt-8 px-4"> 

        <div class='overflow-x-auto w-full'>


            <!-- Tabla: Inicio -->
            <table class='mx-auto max-w-5xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>

                <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Usuario<br>Empresa
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Contacto<br>Tel/email
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Estado
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Rol
                    </th>
                    <th class="font-semibold">
                    @livewire('addbutton', ['href' => route('pedidoCreate')])
                    </th>
                </tr>
                </thead>
                <!-- Tabla: Cuerpo -->
                <tbody class="divide-y divide-gray-200">
                <!-- Tabla por cada usuario de data -->
                @forelse($data as $usuario)
                <livewire:user-row-admin  :usuario="$usuario"/>
                @empty
                @endforelse
                </tbody>
            </table>
            <div class="flex justify-center p-1">
            <?php echo $data->render(); ?>
            </div>
        </div>
    </div>
</x-app-layout>
