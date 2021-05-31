<div>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de Usuario nuevo') }}
        </h2>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="store">
<div class="font-roboto rounded-3xl p-2 grid grid-cols sm:grid-cols-2 xl:grid-cols-12  gap-y-2 gap-x-3 my-4 mx-auto lg:w-4/5 md:w-full p-2  bg-zam-light">
        <!--Titulo-->
        <div class=" shadow-lg grid col-span-2 lg:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Usuario </button>
        </div>
        <!--Datos-->

        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="email">Email</label>
            <input required wire:model="email" name="email" id="email" class="rounded-lg shadow-lg md:max-w-sm" type="email" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="name">Responsable</label>
            <input  required  wire:model="name" name="name" id="name" class="rounded-lg shadow-lg sm:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="password">Contraseña</label>
            <input required wire:model="password" name="password" id="password" class="rounded-lg shadow-lg md:max-w-sm" type="password" maxlength="150">
        </div>
        <div class="grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="password_confirmation">Confirmar</label>
            <input required wire:model="password_confirmation" name="password_confirmation" id="password_confirmation" class="rounded-lg shadow-lg md:max-w-sm" type="password" maxlength="150">
        </div>
        <div class="grid md:col-span-2 xl:col-span-2 row-span-2 ">
            <label for="toggleAdmin">Tipo de Usuario</label>
            <div class="flex flex-row">
            <span wire:click="toggleAdmin" class="hover:bg-zam-dark inline-block w-1/6 max-h-full shadow-lg rounded-l-lg bg-zam-gray font-bold text-xl text-center cursor-pointer">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exchange-alt" class="inline-block my-auto p-2 w-full svg-inline--fa fa-exchange-alt fa-w-16 text-center" role="img" xmlns="http://www.w3.org/2000/svg" width="48" height="48"  viewBox="0 0 512 512"><path fill="currentColor" d="M0 168v-16c0-13.255 10.745-24 24-24h360V80c0-21.367 25.899-32.042 40.971-16.971l80 80c9.372 9.373 9.372 24.569 0 33.941l-80 80C409.956 271.982 384 261.456 384 240v-48H24c-13.255 0-24-10.745-24-24zm488 152H128v-48c0-21.314-25.862-32.08-40.971-16.971l-80 80c-9.372 9.373-9.372 24.569 0 33.941l80 80C102.057 463.997 128 453.437 128 432v-48h360c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24z"></path></svg>
            </span>
            @if($is_admin == 0)
            <span  class="w-5/6 shadow-lg rounded-r-lg bg-zam-green py-2 font-bold text-xl text-center cursor-pointer " > Usuario </span>
            @else
            <span  class="w-5/6 shadow-lg rounded-r-lg bg-zam-alert py-2 font-bold text-xl text-center cursor-pointer " > Admin </span>
            @endif
            </div>
        </div>      

    <!--Titulo-->
    <div class="shadow-lg @if($is_admin == 1) disabled hidden @endif grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-3xl select-none cursor-default" > Contacto </button>
        </div>
        <!--Datos-->
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="business">Empresa</label>
            <input @if($is_admin == 0) required @endif wire:model="business" name="business" id="business" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="cuit">Cuit</label>
            <input @if($is_admin == 0) required @endif wire:model="cuit" name="cuit" id="cuit" class="rounded-lg shadow-lg sm:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="phone">Telefono</label>
            <input @if($is_admin == 0) required @endif wire:model="phone" name="phone" id="phone" class="rounded-lg shadow-lg md:max-w-sm" type="tel" maxlength="18">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="adress">Direccion</label>
            <input @if($is_admin == 0) required @endif wire:model="adress" name="adress" id="adress" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">

        </div>        
        <div class="@if($is_admin == 1) disabled hidden @endif grid md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="country">Pais</label>
            <input @if($is_admin == 0) required @endif wire:model="country" list="paises" name="country" id="country" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">
            <datalist id="paises">
<option value="Afganistán" >
<option value="Albania" >
<option value="Alemania" >
<option value="Andorra" >
<option value="Angola" >
<option value="Anguilla" >
<option value="Antártida" >
<option value="Antigua y Barbuda" >
<option value="Antillas Holandesas" >
<option value="Arabia Saudí" >
<option value="Argelia" >
<option value="Argentina" >
<option value="Armenia" >
<option value="Aruba" >
<option value="Australia" >
<option value="Austria" >
<option value="Azerbaiyán" >
<option value="Bahamas" >
<option value="Bahrein" >
<option value="Bangladesh" >
<option value="Barbados" >
<option value="Bélgica" >
<option value="Belice" >
<option value="Benin" >
<option value="Bermudas" >
<option value="Bielorrusia" >
<option value="Birmania" >
<option value="Bolivia" >
<option value="Bosnia y Herzegovina" >
<option value="Botswana" >
<option value="Brasil" >
<option value="Brunei" >
<option value="Bulgaria" >
<option value="Burkina Faso" >
<option value="Burundi" >
<option value="Bután" >
<option value="Cabo Verde" >
<option value="Camboya" >
<option value="Camerún" >
<option value="Canadá" >
<option value="Chad" >
<option value="Chile" >
<option value="China" >
<option value="Chipre" >
<option value="Ciudad del Vaticano (Santa Sede)" >
<option value="Colombia" >
<option value="Comores" >
<option value="Congo" >
<option value="Congo, República Democrática del" >
<option value="Corea" >
<option value="Corea del Norte" >
<option value="Costa de Marfíl" >
<option value="Costa Rica" >
<option value="Croacia (Hrvatska)" >
<option value="Cuba" >
<option value="Dinamarca" >
<option value="Djibouti" >
<option value="Dominica" >
<option value="Ecuador" >
<option value="Egipto" >
<option value="El Salvador" >
<option value="Emiratos Árabes Unidos" >
<option value="Eritrea" >
<option value="Eslovenia" >
<option value="selected>España" >
<option value="Estados Unidos" >
<option value="Estonia" >
<option value="Etiopía" >
<option value="Fiji" >
<option value="Filipinas" >
<option value="Finlandia" >
<option value="Francia" >
<option value="Gabón" >
<option value="Gambia" >
<option value="Georgia" >
<option value="Ghana" >
<option value="Gibraltar" >
<option value="Granada" >
<option value="Grecia" >
<option value="Groenlandia" >
<option value="Guadalupe" >
<option value="Guam" >
<option value="Guatemala" >
<option value="Guayana" >
<option value="Guayana Francesa" >
<option value="Guinea" >
<option value="Guinea Ecuatorial" >
<option value="Guinea-Bissau" >
<option value="Haití" >
<option value="Honduras" >
<option value="Hungría" >
<option value="India" >
<option value="Indonesia" >
<option value="Irak" >
<option value="Irán" >
<option value="Irlanda" >
<option value="Isla Bouvet" >
<option value="Isla de Christmas" >
<option value="Islandia" >
<option value="Islas Caimán" >
<option value="Islas Cook" >
<option value="Islas de Cocos o Keeling" >
<option value="Islas Faroe" >
<option value="Islas Heard y McDonald" >
<option value="Islas Malvinas" >
<option value="Islas Marianas del Norte" >
<option value="Islas Marshall" >
<option value="Islas menores de Estados Unidos" >
<option value="Islas Palau" >
<option value="Islas Salomón" >
<option value="Islas Svalbard y Jan Mayen" >
<option value="Islas Tokelau" >
<option value="Islas Turks y Caicos" >
<option value="Islas Vírgenes (EEUU)" >
<option value="Islas Vírgenes (Reino Unido)" >
<option value="Islas Wallis y Futuna" >
<option value="Israel" >
<option value="Italia" >
<option value="Jamaica" >
<option value="Japón" >
<option value="Jordania" >
<option value="Kazajistán" >
<option value="Kenia" >
<option value="Kirguizistán" >
<option value="Kiribati" >
<option value="Kuwait" >
<option value="Laos" >
<option value="Lesotho" >
<option value="Letonia" >
<option value="Líbano" >
<option value="Liberia" >
<option value="Libia" >
<option value="Liechtenstein" >
<option value="Lituania" >
<option value="Luxemburgo" >
<option value="Macedonia, Ex-República Yugoslava de" >
<option value="Madagascar" >
<option value="Malasia" >
<option value="Malawi" >
<option value="Maldivas" >
<option value="Malí" >
<option value="Malta" >
<option value="Marruecos" >
<option value="Martinica" >
<option value="Mauricio" >
<option value="Mauritania" >
<option value="Mayotte" >
<option value="México" >
<option value="Micronesia" >
<option value="Moldavia" >
<option value="Mónaco" >
<option value="Mongolia" >
<option value="Montserrat" >
<option value="Mozambique" >
<option value="Namibia" >
<option value="Nauru" >
<option value="Nepal" >
<option value="Nicaragua" >
<option value="Níger" >
<option value="Nigeria" >
<option value="Niue" >
<option value="Norfolk" >
<option value="Noruega" >
<option value="Nueva Caledonia" >
<option value="Nueva Zelanda" >
<option value="Omán" >
<option value="Países Bajos" >
<option value="Panamá" >
<option value="Papúa Nueva Guinea" >
<option value="Paquistán" >
<option value="Paraguay" >
<option value="Perú" >
<option value="Pitcairn" >
<option value="Polinesia Francesa" >
<option value="Polonia" >
<option value="Portugal" >
<option value="Puerto Rico" >
<option value="Qatar" >
<option value="Reino Unido" >
<option value="República Centroafricana" >
<option value="República Checa" >
<option value="República de Sudáfrica" >
<option value="República Dominicana" >
<option value="República Eslovaca" >
<option value="Reunión" >
<option value="Ruanda" >
<option value="Rumania" >
<option value="Rusia" >
<option value="Sahara Occidental" >
<option value="Saint Kitts y Nevis" >
<option value="Samoa" >
<option value="Samoa Americana" >
<option value="San Marino" >
<option value="San Vicente y Granadinas" >
<option value="Santa Helena" >
<option value="Santa Lucía" >
<option value="Santo Tomé y Príncipe" >
<option value="Senegal" >
<option value="Seychelles" >
<option value="Sierra Leona" >
<option value="Singapur" >
<option value="Siria" >
<option value="Somalia" >
<option value="Sri Lanka" >
<option value="St Pierre y Miquelon" >
<option value="Suazilandia" >
<option value="Sudán" >
<option value="Suecia" >
<option value="Suiza" >
<option value="Surinam" >
<option value="Tailandia" >
<option value="Taiwán" >
<option value="Tanzania" >
<option value="Tayikistán" >
<option value="Territorios franceses del Sur" >
<option value="Timor Oriental" >
<option value="Togo" >
<option value="Tonga" >
<option value="Trinidad y Tobago" >
<option value="Túnez" >
<option value="Turkmenistán" >
<option value="Turquía" >
<option value="Tuvalu" >
<option value="Ucrania" >
<option value="Uganda" >
<option value="Uruguay" >
<option value="Uzbekistán" >
<option value="Vanuatu" >
<option value="Venezuela" >
<option value="Vietnam" >
<option value="Yemen" >
<option value="Yugoslavia" >
<option value="Zambia" >
<option value="Zimbabue" >
</datalist>
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
