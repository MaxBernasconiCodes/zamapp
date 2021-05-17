<div>
        <a href="{{route('pedidoEdit', $pedido->id)}}">
        <div class="w-full flex justify-evenly align-middle text-center py-1">
        <p class="border-r m-1"><svg class="h-full m-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dolly" class="svg-inline--fa fa-dolly fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" width="28px" height="20px" viewBox="0 0 576 512"><path fill="currentColor" d="M294.2 277.7c18 5 34.7 13.4 49.5 24.7l161.5-53.8c8.4-2.8 12.9-11.9 10.1-20.2L454.9 47.2c-2.8-8.4-11.9-12.9-20.2-10.1l-61.1 20.4 33.1 99.4L346 177l-33.1-99.4-61.6 20.5c-8.4 2.8-12.9 11.9-10.1 20.2l53 159.4zm281 48.7L565 296c-2.8-8.4-11.9-12.9-20.2-10.1l-213.5 71.2c-17.2-22-43.6-36.4-73.5-37L158.4 21.9C154 8.8 141.8 0 128 0H16C7.2 0 0 7.2 0 16v32c0 8.8 7.2 16 16 16h88.9l92.2 276.7c-26.1 20.4-41.7 53.6-36 90.5 6.1 39.4 37.9 72.3 77.3 79.2 60.2 10.7 112.3-34.8 113.4-92.6l213.3-71.2c8.3-2.8 12.9-11.8 10.1-20.2zM256 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"></path></svg></p>
            <div>           
            <p class="cursor-pointer"><strong>{{$pedido->pedido_nro}}</strong></p>
            <p class="cursor-pointer">{{$pedido->semana_salida}}</p>        
            </div>
        </div> 
        </a>  
        <hr>
        
        
            <div class="w-full flex justify-evenly align-middle text-center py-1">
            <p class="border-r m-1"><svg class="h-full m-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ship" class="svg-inline--fa fa-ship fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" width="28px" height="20px" viewBox="0 0 640 512"><path fill="currentColor" d="M496.616 372.639l70.012-70.012c16.899-16.9 9.942-45.771-12.836-53.092L512 236.102V96c0-17.673-14.327-32-32-32h-64V24c0-13.255-10.745-24-24-24H248c-13.255 0-24 10.745-24 24v40h-64c-17.673 0-32 14.327-32 32v140.102l-41.792 13.433c-22.753 7.313-29.754 36.173-12.836 53.092l70.012 70.012C125.828 416.287 85.587 448 24 448c-13.255 0-24 10.745-24 24v16c0 13.255 10.745 24 24 24 61.023 0 107.499-20.61 143.258-59.396C181.677 487.432 216.021 512 256 512h128c39.979 0 74.323-24.568 88.742-59.396C508.495 491.384 554.968 512 616 512c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24-60.817 0-101.542-31.001-119.384-75.361zM192 128h256v87.531l-118.208-37.995a31.995 31.995 0 0 0-19.584 0L192 215.531V128z"></path></svg></p>
            <div>
            <p class="">{{$pedido->barco_nombre}}</p>
            <p class="">{{$pedido->barco_nro_contenedor}}</p>
            </div>
        </div>
            <hr>
            <br>
            <div class="w-full">
            <a href="{{route('pedidoEdit', $pedido->id)}}">
                @if($pedido->estado == 1)
                <button class="rounded w-full p-2 bg-yellow-100 ">Preparacion</button>
                @elseif($pedido->estado == 2)
                <button class="rounded w-full p-2 bg-yellow-300 ">In Transit</button>
                @elseif($pedido->estado == 3)
                <button class="rounded w-full p-2 bg-green-600 text-gray-50">Entregado</button>
                @else
                <button class="rounded w-full p-2 bg-red-600 text-gray-50">Sin Estado</button>
                @endif
            </a>
            </div>
        <div class="flex flex-wrap justify-around rounded py-2">
            <a href="{{route('pedidoEdit', $pedido->id)}}" class="text-center rounded w-1/2 bg-blue-800 text-blue-200 p-2">Editar</a>
            @if(!$pedido->trashed())
            <form action="{{route('pedidoDelete', $pedido->id)}}" class="flex rounded w-1/2" method="POST"> @csrf @method('DELETE') <button class="w-full rounded bg-red-800 text-red-200 p-2">Eliminar</button></form>
            @else
            <form action="{{route('pedidoDelete', $pedido->id)}}" class=" flex rounded w-1/2" method="POST"> @csrf @method('DELETE') <button class=" w-full rounded bg-yellow-800  text-yellow-200 p-2">Reactivar</button></form>
            @endif
        </div>
</div>
   