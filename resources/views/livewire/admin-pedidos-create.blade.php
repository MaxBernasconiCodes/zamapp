<div>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
</x-slot>

<div class=" font-roboto rounded-tl-3xl grid grid-cols-12 gap-y-2 gap-x-3 my-4 mx-auto md:w-4/5 sm:w-full  bg-zam-light">
        <!--Titulo-->
        <div class="grid col-span-2 row-span-2 py-2 border-r border-zam-green">
        <button class="text-zam-dark font-extrabold text-3xl" > Pedido </button>
        </div>
        <!--Datos-->
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Pedido N°</label>
            <input wire:model="pedido_nro" name="pedido_nro" id="pedido_nro" class="rounded-lg" type="number" min="1" max="99999999" maxlength="8">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Cliente</label>
            <select wire:model="user_id" name="user_id" id="user_id" class="rounded-lg">
             @forelse($clientes as $cliente)
             <option value="{{$cliente->id}}">{{$cliente->business}}</option>
             @empty
             <option value="">Sin Registros</option>
             @endforelse
            </select>
        </div>        
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Estado</label>
            <select wire:model="estado" name="estado" id="estado" class="rounded-lg">
            <option selected value="1" class="bg-zam-light">Preparando</option>
            <option value="2" class="bg-zam-alert">In-Transit</option>
            <option value="3" class="bg-zam-green">Entregado</option>
            </select>
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Pedido N°</label>
            <input wire:model="semana_salida" name="semana_salida" id="semana_salida" class="rounded-lg" type="week">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>


    <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2 border-r border-zam-green">
        <button class="text-zam-dark font-extrabold text-3xl" > Envio </button>
        </div>
        <!--Datos-->
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Agencia</label>
            <input wire:model="agencia" name="agencia" id="agencia" class="rounded-lg" type="text" maxlength="150">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Despachante</label>
            <input wire:model="despachante" name="despachante" id="despachante" class="rounded-lg" type="text" maxlength="150">

        </div>        
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Lugar de consolidacion</label>
            <input wire:model="consolidacion" name="consolidacion" id="consolidacion" class="rounded-lg" type="text" maxlength="150">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Destino</label>
            <input wire:model="destino" name="destino" id="destino" class="rounded-lg" type="text" maxlength="150">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Contenedores</label>
            <input wire:model="contenedores" name="contenedores" id="contenedores" class="rounded-lg" type="number" min="0" max="999999">
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Despachante</label>
            <input wire:model="despachante" name="despachante" id="despachante" class="rounded-lg" type="text" maxlength="150">

        </div>        
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Fecha de corte documental</label>
            <input wire:model="fecha_cortedocumental" name="fecha_cortedocumental" id="fecha_cortedocumental" class="rounded-lg" type="date" >
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <label>Fecha de corte fisico</label>
            <input wire:model="fecha_cortefisico" name="fecha_cortefisico" id="fecha_cortefisico" class="rounded-lg" type="date" >
        </div>
        <div class="grid col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>

</div>
</div>
