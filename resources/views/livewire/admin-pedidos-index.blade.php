<div class="bg-zam-light text-xl  min-w-min ">

    <div class="mx-auto grid grid-rows-2 grid-cols-12 p-2 mb-2">
    
    </div>
<!-- filtros -->
    <div class="font-roboto bg-zam-white"">
    <div class="mx-auto grid grid-rows-2 grid-cols-12 p-2 mb-2 ">
        <div class="flex flex-col col-span-2 row-span-2  ">
            <input wire:model="pedido_nro" name="pedido_nro" id="pedido_nro" class="rounded-lg m-1 shadow " type="number" min="1" maxlength="9" max="999999999" placeholder="N° Pedido" >
            <input wire:model="semana_salida" name="semana_salida" id="semana_salida" class="rounded-lg m-1 shadow " type="week" placeholder="Salida">
        </div>
        <div class="flex flex-col col-span-4 row-span-2 w">
            <select wire:model="user_business" name="user_business" id="user_business" class="rounded-lg m-1 shadow " placeholder="Empresa">
            <option selected value="" >Empresa</option>
            @forelse($clientes as $empresa)
            <option  value="{{$empresa->business}}" >{{$empresa->business}}</option>
            @empty
            @endforelse
            </select>
            <select wire:model="user_name" name="user_name" id="user_name" class="rounded-lg m-1 shadow "   placeholder="Responsable" >
            <option  selected value="" >Responsable</option>
            @forelse($clientes as $empresa)
            <option value="{{$empresa->name}}">{{$empresa->name}}</option>
            @empty
            @endforelse
            </select>
        </div>
        <div class="flex flex-col col-span-4 row-span-2">
            <input wire:model="barco_nro_booking" name="barco_nro_booking" id="barco_nro_booking" class=" rounded-lg m-1 shadow" type="search" placeholder="Booking">

            <select wire:model="estado" name="estado" id="estado" class="rounded-lg m-1 shadow">
            <option value="" selected  class="bg-zam-gray">Cualquier Estado</option>
            <option value="1" class="bg-zam-white text-zam-dark">Preparacion</option>
            <option value="2" class="bg-zam-alert text-zam-dark">In Transit</option>
            <option value="3" class="bg-zam-green text-zam-dark">Entregado</option>
            </select>
            
        </div>
            <div class="flex flex-col col-span-2 row-span-2">
            <button wire:click="clearfilters"  class=" p-2 cursor-pointer hover:text-zam-gray hover:bg-zam-dark hover:shadow rounded-lg bg-zam-green m-1  bold  shadow sm:text-sm md:text-lg lg:text-xl">Reestablecer</button>
            <button class="flex m-1"><a href="{{route('adminPedidosCreate')}}" class="shadow rounded-lg p-2 w-full ">Nuevo</a></button>
            </div>
        </div>
    <!-- each row -->
        @forelse($data as $pedido)
        <div class=" hover:border-zam-green border border-transparent grid grid-cols-12 gap-2 mx-auto py-2 px-6 odd:bg-gray-200 ">
        
            <div class="col-span-2  py-1  cursor-pointer">
            <a href="{{route('adminPedidosEdit', $pedido->id)}}">
                <div class="cursor-pointer"><strong>N°:</strong> {{$pedido->pedido_nro}}</div>
                <div class="cursor-pointer"><strong>Salida:</strong> {{$pedido->semana_salida}}</div>
                </a>
            </div>
        
        <div class="col-span-4  py-1 cursor-pointer">
            
            @if(!is_Null($pedido->user))
            <a href="{{route('adminUsersShow', $pedido->user->id)}}">
            <label class="cursor-pointer"><strong>Agencia:</strong> {{$pedido->user->business}}</label>
            <br>
            <label class="cursor-pointer"><strong>Responsable:</strong> {{$pedido->user->name}}</label>
            </a>
            <br>
            <label class="cursor-pointer"><strong>CUIT:</strong> {{$pedido->user->cuit}}</label>
            </a>
            @else
            <label>
            <strong>Agencia:</strong> {{$clientes->where('id', $pedido->user_id)->first()->business}}</label>
            <br>
            <label>
            <strong>Responsable:</strong> {{$clientes->where('id', $pedido->user_id)->first()->name}}</label>
            @endif
        </div>
        <div class="col-span-4 py-1 cursor-pointer">
            <label><strong>Barco:</strong> {{$pedido->barco_nombre}}</label>
            <br>
            <label><strong>N° Booking:</strong> {{$pedido->barco_nro_booking}}</label>
            <br>
            <label><strong>N° Conetenedor:</strong> {{$pedido->barco_nro_contenedor}}</label>
        </div>
        
        <!-- Botonera -->

        
        <div class="col-span-2 font-roboto font-medium   grid  grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-1 justify-center text-center p-1 cursor-pointer">
            
            <!-- Estado -->
            <div class="2xl:col-span-1 hidden 2xl:block"></div>
           
            <a href="{{route('adminPedidosEdit', $pedido->id)}}" class="sm:text-sm md:text-lg md:col-span-2 overflow-x-hidden">
            @if($pedido->estado == 1)
                    <button class="rounded-lg w-full p-2 bg-zam-gray text-zam-light border ">Preparacion</button>
            @elseif($pedido->estado == 2)
                    <button class="rounded-lg w-full p-2 bg-zam-alert text-zam-dark">In Transit</button>
            @elseif($pedido->estado == 3)
                    <button class="rounded-lg w-full p-2 bg-zam-green text-zam-dark">Entregado</button>
            @else
                    <button class="rounded-lg w-full p-2 bg-zam-danger text-zam-light">Sin Estado</button>
            @endif
            </a>
            <div class="2xl:col-span-1 hidden 2xl:block"></div>
            <div class="2xl:col-span-1 hidden 2xl:block"></div>
            <!-- Edicion  -->
            <button class="hover:text-zam-green col-span-1 mx-auto text-zam-dark rounded-lg w-full   p-1">
            <a href="{{route('adminPedidosEdit', $pedido->id)}}">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="mx-auto svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg>
            </a>
            </button>
            
            <!-- Eliminacion -->
            @if(!$pedido->trashed())
                @if($confirmando===$pedido->id)
                <button wire:click="kill({{ $pedido->id }})" class="hover:bg-zam-danger hover:text-zam-white text-sm col-span-1 mx-auto bg-zam-danger text-zam-light rounded-lg w-full   p-1 border ">
                 ¿Eliminar? 
                </button>
                @else
                <button wire:click="confirm({{ $pedido->id }})" class=" hover:text-zam-green col-span-1 mx-auto  text-zam-dark rounded-lg w-full   p-1 ">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="mx-auto svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                </button>
                @endif
            @else
                @if($confirmando===$pedido->id)
                <button wire:click="recover({{ $pedido->id }})" class="hover:bg-zam-green hover:text-zam-dark text-sm col-span-1 mx-auto bg-zam-green text-zam-dark rounded-lg w-full   p-1 border border-black">
                 ¿Restaurar? 
                </button>
                @else
                <button wire:click="confirm({{ $pedido->id }})" class="hover:bg-zam-dark hover:text-zam-light col-span-1 mx-auto bg-zam-alert text-zam-light rounded-lg w-full   p-1 border border-black">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-restore" class="mx-auto svg-inline--fa fa-trash-restore fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                </button>
                @endif
            @endif
            <div class="2xl:col-span-1 hidden 2xl:block"></div>
        </div>        
</div>
        @empty
        <h1 class=" flex justify-center">No hay pedidos que coincidan con esta busqueda</h1>
        @endforelse
    </div> 
    <div class="flex justify-center  text-center p-5">
            <?php echo $data->render(); ?>      
    </div>
    
</div>