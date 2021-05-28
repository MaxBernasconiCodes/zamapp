<div>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="update">
<div class="font-roboto rounded-tl-3xl grid grid-cols sm:grid-cols-2 xl:grid-cols-12  gap-y-2 gap-x-3 my-4 mx-auto lg:w-4/5 md:w-full p-2  bg-zam-light">
        <!--Titulo-->
        <div class="grid col-span-2 lg:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Pedido </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Pedido N°</label>
            <input required wire:model="pedido_nro" name="pedido_nro" id="pedido_nro" class="rounded-lg sm:max-w-sm" type="number" min="1" max="99999999" maxlength="8">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Cliente</label>
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
            <label>Estado</label>
            <select required wire:model="estado" name="estado" id="estado" class="rounded-lg sm:max-w-sm">
            <option selected value="1" class="bg-zam-light">Preparando</option>
            <option value="2" class="bg-zam-alert">In-Transit</option>
            <option value="3" class="bg-zam-green">Entregado</option>
            </select>
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Salida:</label>
            <input required wire:model="semana_salida" name="semana_salida" id="semana_salida" class="rounded-lg sm:max-w-sm" type="week">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>


    <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Envio </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Agencia</label>
            <input required wire:model="agencia" name="agencia" id="agencia" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Despachante</label>
            <input required wire:model="despachante" name="despachante" id="despachante" class="rounded-lg md:max-w-sm" type="text" maxlength="150">

        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Lugar de consolidacion</label>
            <input required wire:model="consolidacion" name="consolidacion" id="consolidacion" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Destino</label>
            <input required wire:model="destino" name="destino" id="destino" class="rounded-lg sm:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Contenedores</label>
            <input required  wire:model="contenedores" name="contenedores" id="contenedores" class="rounded-lg md:max-w-sm" type="number" min="0" max="999999">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Despachante</label>
            <input required wire:model="despachante" name="despachante" id="despachante" class="rounded-lg md:max-w-sm" type="text" maxlength="150">

        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Fecha de corte documental</label>
            <input required wire:model="fecha_cortedocumental" name="fecha_cortedocumental" id="fecha_cortedocumental" class=" md:max-w-sm rounded-lg" type="date" >
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Fecha de corte fisico</label>
            <input required wire:model="fecha_cortefisico" name="fecha_cortefisico" id="fecha_cortefisico" class="rounded-lg md:max-w-sm" type="date" >
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>

    <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Barco </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Nombre</label>
            <input required wire:model="barco_nombre" name="barco_nombre" id="barco_nombre" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Contenedores</label>
            <input required wire:model="barco_contenedores" name="barco_contenedores" id="barco_contenedores" class="rounded-lg md:max-w-sm" type="number" min=0 max="99999999">

        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>N° de Contenedor</label>
            <input required wire:model="barco_nro_contenedor" name="barco_nro_contenedor" id="barco_nro_contenedor" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Remito N°</label>
            <input required wire:model="barco_nro_remito" name="barco_nro_remito" id="barco_nro_remito" class="rounded-lg sm:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>N° de Booking</label>
            <input required  wire:model="barco_nro_booking" name="barco_nro_booking" id="barco_nro_booking" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>     
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Fecha de destino</label>
            <input required wire:model="fecha_destino" name="fecha_destino" id="fecha_destino" class=" md:max-w-sm rounded-lg" type="date" >
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
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>

            <!--Titulo-->
            <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Documentos asociados </button>
        </div>
        <!--Datos-->
        <div class="grid  col-span-2 xl:col-span-10 row-span-2 py-2 w-full">
        <div class="flex flex-row flex-wrap">
          @if(!is_null($documentos))
            @forelse($documentos as $doc)
            <div class=" flex flex-row  flex-wrap "><a href="/{{$doc->direccion}}" class=" flex rounded-l-full @if($doc->descargado) bg-zam-gray @else bg-zam-alert @endif text-bold p-2 m-1 mr-0 ">{{$doc->original}}  </a> 
            <label wire:click="aquitar({{$doc->id}})" class="@if($porquitar == $doc->id) hidden @else flex @endif rounded-r-lg  bg-zam-gray text-zam-white p-2 m-1 ml-0"> X </label> 
            <label wire:click="quitardoc({{$doc->id}})" class="@if($porquitar == $doc->id) flex @else hidden @endif rounded-r-full bg-zam-danger text-zam-white p-2 m-1 ml-0"> X </label>
            </div>
            @empty
            @endforelse
          @endif
        </div>
        </div>
        
        <!--Datos-->
        @error('documento')
        <div class="alert alert-danger">El documento debe ser de alguno de los tipos: xml, xls, xlsm, xlsx o pdf y menor a 200mb </div>
        @enderror
        <div class="grid col-span-2 row-span-2 py-2">
            @if(is_null($documento))
            <label for="archivos" class="rounded bg-zam-gray p-2 text-center cursor-pointer">Agregar Archivos</label>
            @else
            <a wire:click="anularupload" class="rounded bg-zam-gray p-2 text-center cursor-pointe">Archivo listo para subir, Click para quitar</a>
            @endif
            <input hidden id="archivos" name="archivos" wire:model="documento" type="file" accept=".xls,.xlsx,pdf">
            @if(!is_null($documento))
            @if(!$archivoConfirm)
            <a wire:click="Agregarconfirm" class="rounded-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Subir Archivo </a>
            @else
            <a wire:click="AgregarArchivos" class="rounded-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > ¿Confirma? </a>
            @endif
            @endif
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
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>   


            <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Descripcion </button>
        </div>
        <!--Datos-->
        <div class="grid  col-span-2 xl:col-span-10 row-span-2 py-2 w-full">
            <input wire:model="descripcion" name="descripcion" id="descripcion" class="rounded-lg " type="text" maxlength="500">
        </div>

        <!--Datos-->
        <div class="grid col-span-2  row-span-2 py-2">
            @if(!$solicitado)
            <a wire:click="confirmacion" class="rounded-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Guardar </a>
            @else
            <button wire:click="confirmacion" class="rounded-lg bg-zam-alert p-2 font-bold text-xl" > ¿Confirma? </button>
            @endif
        </div>      
</div>
</form>
</div>
