<div>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de Usuario nuevo') }}
        </h2>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="store">
<div class="font-roboto rounded-tl-3xl grid grid-cols sm:grid-cols-2 xl:grid-cols-12  gap-y-2 gap-x-3 my-4 mx-auto lg:w-4/5 md:w-full p-2  bg-zam-light">
        <!--Titulo-->
        <div class=" shadow-lg grid col-span-2 lg:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Usuario </button>
        </div>
        <!--Datos-->

        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Email</label>
            <input required wire:model="email" name="email" id="email" class="rounded-lg md:max-w-sm" type="email" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Responsable</label>
            <input  required  wire:model="name" name="name" id="name" class="rounded-lg sm:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Contraseña</label>
            <input required wire:model="password" name="password" id="password" class="rounded-lg md:max-w-sm" type="password" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Confirmar</label>
            <input required wire:model="password_confirmation" name="password_confirmation" id="password_confirmation" class="rounded-lg md:max-w-sm" type="password" maxlength="150">
        </div>
        <div class="grid md:col-span-2 xl:col-span-2 row-span-2 ">
            <label>Tipo de Usuario</label>
            @if($is_admin == 0)
            <label wire:click="toggleAdmin" class="shadow-lg rounded-lg bg-zam-green mb-2 pt-2 font-bold text-xl text-center cursor-pointer" > Usuario </label>
            @else
            <label wire:click="toggleAdmin" class="shadow-lg rounded-lg bg-zam-alert mb-2 pt-2 font-bold text-xl text-center cursor-pointer " > Admin </label>
            @endif
        </div>      

    <!--Titulo-->
    <div class="shadow-lg @if($is_admin == 1) disabled hidden @endif grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Contacto </button>
        </div>
        <!--Datos-->
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Empresa</label>
            <input @if($is_admin == 0) required @endif wire:model="business" name="business" id="business" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Cuit</label>
            <input @if($is_admin == 0) required @endif wire:model="cuit" name="cuit" id="cuit" class="rounded-lg sm:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Telefono</label>
            <input @if($is_admin == 0) required @endif wire:model="phone" name="phone" id="phone" class="rounded-lg md:max-w-sm" type="tel" maxlength="18">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Direccion</label>
            <input @if($is_admin == 0) required @endif wire:model="adress" name="adress" id="adress" class="rounded-lg md:max-w-sm" type="text" maxlength="150">

        </div>        
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label>Pais</label>
            <input @if($is_admin == 0) required @endif wire:model="country" name="country" id="country" class="rounded-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <!-- Espacio disponible para estacionamiento -->
        </div>
       
       
        <!--Datos-->
        <div class="grid md:col-span-2 xl:col-span-2 row-span-2 py-2">
            @if(!$confirmacion)
            <a wire:click="solicitar" class="rounded-lg shadow-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Guardar </a>
            @else
            <button wire:click="solicitar" class=" shadow-lg rounded-lg bg-zam-alert p-2 font-bold text-xl" > ¿Confirma? </button>
            @endif
        </div>      
</div>
</form>
</div>
