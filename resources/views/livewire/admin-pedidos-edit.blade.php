<div>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de pedido nuevo') }}
        </h2>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="update">
<div class="font-roboto rounded-3xl grid grid-cols md:grid-cols-2  xl:grid-cols-12  gap-y-2 gap-x-3 my-4  mx-auto lg:w-4/5 md:w-full p-2  bg-zam-light">
        <!--Titulo-->
        <div class="grid col-span-2 md:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Pedido </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="pedido_nro" >Pedido N°</label>
            <input  disabled wire:model="pedido_nro" name="pedido_nro" id="pedido_nro" class="rounded-lg min-w-full" type="number" min="1" max="99999999" maxlength="8">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="user_id" >Cliente</label>
            <select required wire:model="user_id" name="user_id" id="user_id" class="rounded-lg min-w-full">
            <option selected disabled> Seleccione </option>
             @forelse($clientes as $cliente)
             <option value="{{$cliente->id}}">{{$cliente->business}}</option>
             @empty
             <option value="">Sin Registros</option>
             @endforelse
            </select>
        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="estado" >Estado</label>
            <select required wire:model="estado" name="estado" id="estado" class="rounded-lg min-w-full">
            <option selected value="1" class="bg-zam-light">Preparando</option>
            <option value="2" class="bg-zam-alert">In-Transit</option>
            <option value="3" class="bg-zam-green">Entregado</option>
            </select>
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="semana_salida" >Salida:</label>
            <input required wire:model="semana_salida" name="semana_salida" id="semana_salida" class="rounded-lg min-w-full" type="week">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>


    <!--Titulo-->
    <div class="grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Envio </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="agencia" >Agencia</label>
            <input required wire:model="agencia" name="agencia" id="agencia" class="rounded-lg  min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="despachante" >Despachante</label>
            <input required wire:model="despachante" name="despachante" id="despachante" class="rounded-lg min-w-full" type="text" maxlength="150">

        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="consolidacion" >Lugar de consolidacion</label>
            <input required wire:model="consolidacion" name="consolidacion" id="consolidacion" class="rounded-lg min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="destino" >Destino</label>
            <input required wire:model="destino" name="destino" id="destino" class="rounded-lg min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="contenedores" >Contenedores</label>
            <input required  wire:model="contenedores" name="contenedores" id="contenedores" class="rounded-lg min-w-full" type="number" min="0" max="999999">
        </div>

        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_cortedocumental" >Fecha de corte documental</label>
            <input required wire:model="fecha_cortedocumental" name="fecha_cortedocumental" id="fecha_cortedocumental" class=" min-w-full rounded-lg" type="date" >
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_cortefisico" >Fecha de corte fisico</label>
            <input required wire:model="fecha_cortefisico" name="fecha_cortefisico" id="fecha_cortefisico" class="rounded-lg  min-w-full" type="date" >
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
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Barco </button>
        </div>
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nombre" >Nombre</label>
            <input required wire:model="barco_nombre" name="barco_nombre" id="barco_nombre" class="rounded-lg min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_contenedores" >Contenedores</label>
            <input required wire:model="barco_contenedores" name="barco_contenedores" id="barco_contenedores" class="rounded-lg min-w-full" type="number" min=0 max="99999999">

        </div>        
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_contenedor" >N° de Contenedor</label>
            <input required wire:model="barco_nro_contenedor" name="barco_nro_contenedor" id="barco_nro_contenedor" class="rounded-lg  min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_remito" >Remito N°</label>
            <input required wire:model="barco_nro_remito" name="barco_nro_remito" id="barco_nro_remito" class="rounded-lg min-w-full" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="barco_nro_booking" >N° de Booking</label>
            <input required  wire:model="barco_nro_booking" name="barco_nro_booking" id="barco_nro_booking" class="rounded-lg min-w-full" type="text" maxlength="150">
        </div>     
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="fecha_destino" >Fecha de destino</label>
            <input required wire:model="fecha_destino" name="fecha_destino" id="fecha_destino" class="rounded-lg min-w-full" type="date" >
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
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Documentos asociados </button>
        </div>
        <!--Datos-->
        <div class="grid  col-span-2 xl:col-span-10 row-span-2 py-2 w-full">
        <div class="flex flex-row flex-wrap border border-black">
          @if(!is_null($documentos))
            @forelse($documentos as $doc)
            <div class=" flex flex-row  "><a href="/{{$doc->direccion}}" class=" flex rounded-l-lg @if($doc->descargado) bg-zam-gray @else bg-zam-alert @endif text-bold p-2 m-1 mr-0 ">{{$doc->original}}  </a> 
            <label wire:click="aquitar({{$doc->id}})" class="@if($porquitar == $doc->id) hidden @else flex @endif rounded-r-lg  bg-zam-gray text-zam-white p-2 m-1 ml-0"> X </label> 
            <label wire:click="quitardoc({{$doc->id}})" class="@if($porquitar == $doc->id) flex @else hidden @endif rounded-r-lg bg-zam-danger text-zam-white p-2 m-1 ml-0"> X </label>
            </div>
            @empty
            <div class=" flex flex-row  flex-wrap "><label href="" class=" flex  text-bold p-2 m-1 mr-0 select-none"> Sin documentos aun  </label> </div>
            @endforelse
          @endif
        </div>
        </div>
        
        <!--Datos-->
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 ml-1">
            @if(is_null($documento))
            <label for="archivos" class="w-full shadow-lg rounded-xl bg-zam-gray  p-2 text-center cursor-pointer"> 
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-upload" class="flex svg-inline--fa fa-file-upload fa-w-12 w-full max-h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm65.18 216.01H224v80c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16v-80H94.82c-14.28 0-21.41-17.29-11.27-27.36l96.42-95.7c6.65-6.61 17.39-6.61 24.04 0l96.42 95.7c10.15 10.07 3.03 27.36-11.25 27.36zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg> Agregar Documento 
            </label>
            @else
            <span class="flex flex-row"><label class=" flex w-4/5 rounded-tl-lg  bg-zam-gray p-2 text-center cursor-pointe">{{ $documento->getClientOriginalName() }} </label> <span wire:click="anularupload" class=" flex w-1/5 cursor-pointer i rounded-tr-lg bg-zam-danger text-zam-white p-2 "> X </span></span>
            <a wire:click="AgregarArchivos" class="shadow-lg rounded-b-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Confirmar </a>

            @endif
            <input hidden id="archivos" class=" hidden" name="archivos" wire:model="documento" type="file" accept=".xls,.xlsx,pdf">     
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
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Descripcion </button>
        </div>
        <!--Datos-->
        <div class="grid  col-span-2 xl:col-span-10 row-span-2 py-2 w-full">
            <input wire:model="descripcion" name="descripcion" id="descripcion" class="rounded-lg " type="text" maxlength="500">
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
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
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
