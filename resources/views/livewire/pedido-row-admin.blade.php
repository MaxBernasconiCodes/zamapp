<div class=" hover:border-zam-green border border-transparent grid grid-cols-8 gap-4 mx-auto py-4 px-6 odd:bg-zam-dark odd:text-zam-light">
        <a href="{{route('pedidoEdit', $pedido->id)}}">
            <div class="col-span-2  py-2  cursor-pointer">
            
                <label class="cursor-pointer"><strong>N°: {{$pedido->pedido_nro}}</strong></label>
                <br>
                <label class="cursor-pointer">Salida: <br>{{$pedido->semana_salida}}</label>
            </div>
        </a>
        <div class="col-span-2  py-2 cursor-pointer">
            
            @if(!is_Null($pedido->user))
            <a href="{{route('usersShow', $pedido->user->id)}}">
            <label class="cursor-pointer"><strong>Agencia: {{$pedido->user->business}}</strong></label>
            <br>
            <label class="cursor-pointer">Responsable: {{$pedido->user->name}}</label>
            </a>
            @else
            <label><strong>
            Agencia: {{$clientes->where('id', $pedido->user_id)->first()->business}}</strong></label>
            <br>
            <label>
            Responsable: {{$clientes->where('id', $pedido->user_id)->first()->name}}</label>
            @endif
        </div>
        <div class="col-span-2   py-2 cursor-pointer">
            <label>Barco: {{$pedido->barco_nombre}}</label>
            <br>
            <label>N° Conetenedor: {{$pedido->barco_nro_contenedor}}</label>
        </div>
        <div class="col-span-2   py-2 cursor-pointer">
            <label>Barco: {{$pedido->barco_nombre}}</label>
            <br>
            <label>N° Booking: {{$pedido->barco_nro_booking}}</label>
            <br>
            <label>N° Conetenedor: {{$pedido->barco_nro_contenedor}}</label>
        </div>
        <div class="col-span-1 font-roboto font-medium  grid grid-rows-2 grid-cols-2 gap-1 justify-center text-center py-2 cursor-pointer">
            <a href="{{route('pedidoEdit', $pedido->id)}}" class="col-span-2">
            @if($pedido->estado == 1)
                    <button class="rounded-lg w-full p-2 bg-zam-light text-zam-dark border border-zam-dark ">Preparacion</button>
            @elseif($pedido->estado == 2)
                    <button class="rounded-lg w-full p-2 bg-zam-alert text-zam-dark">In Transit</button>
            @elseif($pedido->estado == 3)
                    <button class="rounded-lg w-full p-2 bg-zam-green text-zam-dark">Entregado</button>
            @else
                    <button class="rounded-lg w-full p-2 bg-zam-danger text-zam-light">Sin Estado</button>
            @endif
            </a>
        
        
            <button class="hover:bg-zam-dark hover:text-zam-light col-span-1 mx-auto bg-zam-light text-zam-dark rounded-lg w-full   p-1 border border-black">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="mx-auto svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg>
            </button>
            @if(!$pedido->trashed())
                @if($confirmando===$pedido->id)
                <button wire:click="kill({{ $pedido->id }})" class="hover:bg-zam-danger hover:text-zam-white col-span-1 mx-auto bg-zam-danger text-zam-light rounded-lg w-full   p-1 border border-black">
                 ¿Eliminar? 
                </button>
                @else
                <button wire:click="confirm({{ $pedido->id }})" class="hover:bg-zam-dark hover:text-zam-light col-span-1 mx-auto bg-zam-light text-zam-dark rounded-lg w-full   p-1 border border-black">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="mx-auto svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                </button>
                @endif
            @else
                @if($confirmando===$pedido->id)
                <button wire:click="restore({{ $pedido->id }})" class="hover:bg-zam-green hover:text-zam-dark col-span-1 mx-auto bg-zam-green text-zam-dark rounded-lg w-full   p-1 border border-black">
                 ¿Restaurar? 
                </button>
                @else
                <button wire:click="confirm({{ $pedido->id }})" class="hover:bg-zam-dark hover:text-zam-light col-span-1 mx-auto bg-zam-alert text-zam-light rounded-lg w-full   p-1 border border-black">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-restore" class="mx-auto svg-inline--fa fa-trash-restore fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                </button>
                @endif
            @endif
            
            
        </div>
        
    
</div>
