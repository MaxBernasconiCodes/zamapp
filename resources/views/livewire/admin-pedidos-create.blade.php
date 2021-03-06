<div>
<x-slot name="header">
<div class="font-semibold text-xl text-gray-800 leading-tight flex flex-row justify-between"> 
        <h2 class="flex text-center">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
        <a href="{{route('adminPedidosIndex')}}"><h2 class="text-2xl hover:text-zam-green ease-in-out duration-150"><i class="fas fa-arrow-circle-left"></i></h2></a>
</div>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="store">
<div class="font-roboto rounded-3xl p-2 grid grid-cols sm:grid-cols-2 xl:grid-cols-12  gap-y-2 gap-x-3 my-4 mx-auto lg:w-4/5 md:w-full  bg-zam-light">
        <!--Titulo-->
        <div class="grid col-span-2 lg:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Pedido </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="pedido_nro">Pedido N°</label>
            <input required wire:model="pedido_nro" name="pedido_nro" id="pedido_nro" class="rounded-lg sm:max-w-sm" type="number" min="1" max="99999999" maxlength="8">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="user_id">Cliente</label>
            <select required wire:model="user_id" name="user_id" id="user_id" class="rounded-lg sm:max-w-sm">
            <option selected disabled> Seleccione </option>
             @forelse($clientes as $cliente)
             <option value="{{$cliente->id}}">{{$cliente->business}}</option>
             @empty
             <option value="">Sin Registros</option>
             @endforelse
            </select>
        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="estado">Estado</label>
            <select required wire:model="estado" name="estado" id="estado" class="rounded-lg sm:max-w-sm">
            <option selected value="1" class="bg-zam-light">Preparando</option>
            <option value="2" class="bg-zam-alert">In-Transit</option>
            <option value="3" class="bg-zam-green">Entregado</option>
            </select>
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="semana_salida">Salida:</label>
            <input required wire:model="semana_salida" name="semana_salida" id="semana_salida" class="rounded-lg sm:max-w-sm" type="week">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>


    <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Envio </button>
        </div>
        <!--Datos-->
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="agencia">Agencia</label>
            <input required wire:model="agencia" name="agencia" id="agencia" class="rounded-lg md:max-w-sm" type="text" minlength="3"  maxlength="150">
        </div>     
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="consolidacion">Lugar de consolidacion</label>
            <input required wire:model="consolidacion" name="consolidacion" id="consolidacion" class="rounded-lg md:max-w-sm" type="text"  minlength="3" maxlength="150">
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="destino">Destino</label>
            <input required wire:model="destino" name="destino" id="destino" class="rounded-lg sm:max-w-sm" type="text" minlength="3" maxlength="150">
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="contenedores">Contenedores</label>
            <input required  wire:model="contenedores" name="contenedores" id="contenedores" class="rounded-lg md:max-w-sm" type="number" min="0" max="999999">
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="despachante">Despachante</label>
            <input required wire:model="despachante" name="despachante" id="despachante" class="rounded-lg md:max-w-sm" type="text" minlength="3" maxlength="150">

        </div>        
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_cortedocumental">Corte documental</label>
            <input required wire:model="fecha_cortedocumental" name="fecha_cortedocumental" id="fecha_cortedocumental" class=" md:max-w-sm rounded-lg" type="date" >
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_cortefisico">Corte fisico</label>
            <input required wire:model="fecha_cortefisico" name="fecha_cortefisico" id="fecha_cortefisico" class="rounded-lg md:max-w-sm" type="date" >
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>

    <!--Titulo-->
    <div class="grid col-span-2 row-span-2 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Barco </button>
        </div>
        <!--Datos-->
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nombre">Nombre</label>
            <input required wire:model="barco_nombre" name="barco_nombre" id="barco_nombre" class="rounded-lg md:max-w-sm" type="text" minlength="3" maxlength="150">
        </div>
     
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_contenedor">N° de Contenedor</label>
            <input required wire:model="barco_nro_contenedor" name="barco_nro_contenedor" id="barco_nro_contenedor" class="rounded-lg md:max-w-sm" type="text" minlength="3" maxlength="150">
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_remito">Remito N°</label>
            <input required wire:model="barco_nro_remito" name="barco_nro_remito" id="barco_nro_remito" class="rounded-lg sm:max-w-sm" type="text" minlength="3" maxlength="150">
        </div>
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_booking">N° de Booking</label>
            <input required  wire:model="barco_nro_booking" name="barco_nro_booking" id="barco_nro_booking" class="rounded-lg md:max-w-sm" type="text" minlength="3"  maxlength="150">
        </div>     
        <div class="flex flex-col md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_destino">Fecha de destino</label>
            <input required wire:model="fecha_destino" name="fecha_destino" id="fecha_destino" class=" md:max-w-sm rounded-lg" type="date" >
        </div>

            <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default text-center align-middle inline-block" > Descripcion </button>
        </div>
        <!--Datos-->
        <div class="grid  col-span-2 xl:col-span-10 row-span-2 py-2 w-full">
            <input wire:model="descripcion" name="descripcion" id="descripcion" class="rounded-lg " type="text" minlength="3" " maxlength="500">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
       
        <!--Datos-->
        <div class="grid md:col-span-2 xl:col-span-2 row-span-2 py-2">
            @if(!$solicitado)
            <a wire:click="confirmacion" class="rounded-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Guardar </a>
            @else
            <button wire:click="confirmacion" class="rounded-lg bg-zam-alert p-2 font-bold text-xl" > ¿Confirma? </button>
            @endif
        </div>      
</div>
</form>
</div>
