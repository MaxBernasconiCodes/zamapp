
<div> 
<x-slot name="header">
<div class="flex flex-row justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando usuario: ') }} {{$name}}
        </h2>
        <a href="{{route('adminUsersIndex')}}"><h2 class="text-2xl hover:text-zam-green ease-in-out duration-150"><i class="fas fa-arrow-circle-left"></i></h2></a>
</div>
</x-slot>
<x-jet-validation-errors class="mb-4" />
<form wire:submit.prevent="update">
<div class="font-roboto rounded-3xl p-2 grid grid-cols sm:grid-cols-2 xl:grid-cols-12  gap-y-2 gap-x-3 my-4 mx-auto w-auto  bg-zam-light">
        <!--Titulo-->
        <div class=" shadow-lg grid col-span-2 lg:row-span-2 py-2 border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Usuario </button>
        </div>
        <!--Datos-->

        <div class="flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="email">Email</label>
            <input required wire:model="email" name="email" id="email" class="rounded-lg shadow-lg md:max-w-sm" type="email" maxlength="150">
        </div>
        <div class="flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="name">Responsable</label>
            <input  required  wire:model="name" name="name" id="name" class="rounded-lg shadow-lg md:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            
        </div>
        
        <div class="flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2  align-middle p-2">
            <label for="toggleAdmin">Tipo de Usuario</label>
            <div class="flex flex-row">
            <div wire:click="toggleAdmin" class="p-2 ease-in-out duration-150 transition-all hover:bg-zam-dark inline-block sm:flex-grow-0 md:flex-grow-1 h-full shadow-lg rounded-l-lg bg-zam-gray font-bold text-xl text-center cursor-pointer">
            <i class="fas fa-exchange-alt"></i>
            </div>
            @if($is_admin == 0)
            <label  class="p-2 shadow-lg rounded-r-lg bg-zam-green py-1.5 font-bold text-lg  cursor-pointer " > Cliente </label>
            @else
            <label  class="p-2 shadow-lg rounded-r-lg bg-zam-alert py-1.5 font-bold text-lg cursor-pointer " > Admin </label>
            @endif
            </div>
        </div>
        <div class="flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            
        </div>      

    <!--Titulo-->
    <div class="shadow-lg @if($is_admin == 1) disabled hidden @endif grid col-span-2 row-span-4 py-2  border-b sm:border-r border-zam-green select-none">
        <button disabled class="text-zam-dark font-extrabold text-xl select-none cursor-default" > Contacto </button>
        </div>
        <!--Datos-->
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="business">Empresa</label>
            <input @if($is_admin == 0) required @endif wire:model="business" name="business" id="business" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="cuit">Cuit</label>
            <input @if($is_admin == 0) required @endif wire:model="cuit" name="cuit" id="cuit" class="rounded-lg shadow-lg md:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="consigne">Consigne</label>
            <input @if($is_admin == 0) required @endif wire:model="consigne" name="consigne" id="consigne" class="rounded-lg shadow-lg md:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="notify">Notify</label>
            <input @if($is_admin == 0) required @endif wire:model="notify" name="notify" id="notify" class="rounded-lg shadow-lg md:max-w-sm" type="text" type="text" maxlength="150">
        </div>
        @if($is_admin == 0)
        <div class=" hidden disabled xl:inline-block md:col-span-1 xl:col-span-2 row-span-2 py-2">
        </div>
        @endif
        

        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="phone">Telefono</label>
            <input @if($is_admin == 0) required @endif wire:model="phone" name="phone" id="phone" class="rounded-lg shadow-lg md:max-w-sm" type="tel" maxlength="18">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="adress">Direccion</label>
            <input @if($is_admin == 0) required @endif wire:model="adress" name="adress" id="adress" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">
        </div>
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="postalcode">Codigo Postal</label>
            <input @if($is_admin == 0) required @endif wire:model="postalcode" name="postalcode" id="postalcode" class="rounded-lg shadow-lg md:max-w-sm" type="text" type="text" maxlength="150">
        </div>

                
        <div class="@if($is_admin == 1) disabled hidden @endif flex flex-col col-span-2 md:col-span-1 xl:col-span-2 row-span-2 py-2">
            <label for="country">Pais</label>
            <input @if($is_admin == 0) required @endif wire:model="country" list="paises" name="country" id="country" class="rounded-lg shadow-lg md:max-w-sm" type="text" maxlength="150">
            <!-- Lista de paises -->
            <datalist id="paises">
                <option value="Afganist??n" >
                <option value="Albania" >
                <option value="Alemania" >
                <option value="Andorra" >
                <option value="Angola" >
                <option value="Anguilla" >
                <option value="Ant??rtida" >
                <option value="Antigua y Barbuda" >
                <option value="Antillas Holandesas" >
                <option value="Arabia Saud??" >
                <option value="Argelia" >
                <option value="Argentina" >
                <option value="Armenia" >
                <option value="Aruba" >
                <option value="Australia" >
                <option value="Austria" >
                <option value="Azerbaiy??n" >
                <option value="Bahamas" >
                <option value="Bahrein" >
                <option value="Bangladesh" >
                <option value="Barbados" >
                <option value="B??lgica" >
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
                <option value="But??n" >
                <option value="Cabo Verde" >
                <option value="Camboya" >
                <option value="Camer??n" >
                <option value="Canad??" >
                <option value="Chad" >
                <option value="Chile" >
                <option value="China" >
                <option value="Chipre" >
                <option value="Ciudad del Vaticano (Santa Sede)" >
                <option value="Colombia" >
                <option value="Comores" >
                <option value="Congo" >
                <option value="Congo, Rep??blica Democr??tica del" >
                <option value="Corea" >
                <option value="Corea del Norte" >
                <option value="Costa de Marf??l" >
                <option value="Costa Rica" >
                <option value="Croacia (Hrvatska)" >
                <option value="Cuba" >
                <option value="Dinamarca" >
                <option value="Djibouti" >
                <option value="Dominica" >
                <option value="Ecuador" >
                <option value="Egipto" >
                <option value="El Salvador" >
                <option value="Emiratos ??rabes Unidos" >
                <option value="Eritrea" >
                <option value="Eslovenia" >
                <option value="selected>Espa??a" >
                <option value="Estados Unidos" >
                <option value="Estonia" >
                <option value="Etiop??a" >
                <option value="Fiji" >
                <option value="Filipinas" >
                <option value="Finlandia" >
                <option value="Francia" >
                <option value="Gab??n" >
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
                <option value="Hait??" >
                <option value="Honduras" >
                <option value="Hungr??a" >
                <option value="India" >
                <option value="Indonesia" >
                <option value="Irak" >
                <option value="Ir??n" >
                <option value="Irlanda" >
                <option value="Isla Bouvet" >
                <option value="Isla de Christmas" >
                <option value="Islandia" >
                <option value="Islas Caim??n" >
                <option value="Islas Cook" >
                <option value="Islas de Cocos o Keeling" >
                <option value="Islas Faroe" >
                <option value="Islas Heard y McDonald" >
                <option value="Islas Malvinas" >
                <option value="Islas Marianas del Norte" >
                <option value="Islas Marshall" >
                <option value="Islas menores de Estados Unidos" >
                <option value="Islas Palau" >
                <option value="Islas Salom??n" >
                <option value="Islas Svalbard y Jan Mayen" >
                <option value="Islas Tokelau" >
                <option value="Islas Turks y Caicos" >
                <option value="Islas V??rgenes (EEUU)" >
                <option value="Islas V??rgenes (Reino Unido)" >
                <option value="Islas Wallis y Futuna" >
                <option value="Israel" >
                <option value="Italia" >
                <option value="Jamaica" >
                <option value="Jap??n" >
                <option value="Jordania" >
                <option value="Kazajist??n" >
                <option value="Kenia" >
                <option value="Kirguizist??n" >
                <option value="Kiribati" >
                <option value="Kuwait" >
                <option value="Laos" >
                <option value="Lesotho" >
                <option value="Letonia" >
                <option value="L??bano" >
                <option value="Liberia" >
                <option value="Libia" >
                <option value="Liechtenstein" >
                <option value="Lituania" >
                <option value="Luxemburgo" >
                <option value="Macedonia, Ex-Rep??blica Yugoslava de" >
                <option value="Madagascar" >
                <option value="Malasia" >
                <option value="Malawi" >
                <option value="Maldivas" >
                <option value="Mal??" >
                <option value="Malta" >
                <option value="Marruecos" >
                <option value="Martinica" >
                <option value="Mauricio" >
                <option value="Mauritania" >
                <option value="Mayotte" >
                <option value="M??xico" >
                <option value="Micronesia" >
                <option value="Moldavia" >
                <option value="M??naco" >
                <option value="Mongolia" >
                <option value="Montserrat" >
                <option value="Mozambique" >
                <option value="Namibia" >
                <option value="Nauru" >
                <option value="Nepal" >
                <option value="Nicaragua" >
                <option value="N??ger" >
                <option value="Nigeria" >
                <option value="Niue" >
                <option value="Norfolk" >
                <option value="Noruega" >
                <option value="Nueva Caledonia" >
                <option value="Nueva Zelanda" >
                <option value="Om??n" >
                <option value="Pa??ses Bajos" >
                <option value="Panam??" >
                <option value="Pap??a Nueva Guinea" >
                <option value="Paquist??n" >
                <option value="Paraguay" >
                <option value="Per??" >
                <option value="Pitcairn" >
                <option value="Polinesia Francesa" >
                <option value="Polonia" >
                <option value="Portugal" >
                <option value="Puerto Rico" >
                <option value="Qatar" >
                <option value="Reino Unido" >
                <option value="Rep??blica Centroafricana" >
                <option value="Rep??blica Checa" >
                <option value="Rep??blica de Sud??frica" >
                <option value="Rep??blica Dominicana" >
                <option value="Rep??blica Eslovaca" >
                <option value="Reuni??n" >
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
                <option value="Santa Luc??a" >
                <option value="Santo Tom?? y Pr??ncipe" >
                <option value="Senegal" >
                <option value="Seychelles" >
                <option value="Sierra Leona" >
                <option value="Singapur" >
                <option value="Siria" >
                <option value="Somalia" >
                <option value="Sri Lanka" >
                <option value="St Pierre y Miquelon" >
                <option value="Suazilandia" >
                <option value="Sud??n" >
                <option value="Suecia" >
                <option value="Suiza" >
                <option value="Surinam" >
                <option value="Tailandia" >
                <option value="Taiw??n" >
                <option value="Tanzania" >
                <option value="Tayikist??n" >
                <option value="Territorios franceses del Sur" >
                <option value="Timor Oriental" >
                <option value="Togo" >
                <option value="Tonga" >
                <option value="Trinidad y Tobago" >
                <option value="T??nez" >
                <option value="Turkmenist??n" >
                <option value="Turqu??a" >
                <option value="Tuvalu" >
                <option value="Ucrania" >
                <option value="Uganda" >
                <option value="Uruguay" >
                <option value="Uzbekist??n" >
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
        
       
       
        <!--botones-->
        <div class="flex flex-col  col-span-2 row-span-4 py-2">
            @if(!$confirmacion)
            <a wire:click="solicitar" class="rounded-lg shadow-lg bg-zam-green p-2 font-bold text-xl text-center cursor-pointer" > Guardar </a>
            @else
            <button wire:click="solicitar" class=" shadow-lg rounded-lg bg-zam-alert p-2 font-bold text-xl" > ??Confirma? </button>
            @endif
        </div>      
</div>
</form>
</div>
