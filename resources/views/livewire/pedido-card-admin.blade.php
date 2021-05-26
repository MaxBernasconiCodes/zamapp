<div>
        @if(Auth::user()->is_admin == 1)
        <a href="{{route('pedidoEdit', $pedido->id)}}">
        @endif
        <div class="w-full flex justify-start align-middle text-center p-2 shadow ">
        <p class="border-r m-1"><svg class="h-full m-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dolly" class="svg-inline--fa fa-dolly fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" width="28px" height="20px" viewBox="0 0 576 512"><path fill="currentColor" d="M294.2 277.7c18 5 34.7 13.4 49.5 24.7l161.5-53.8c8.4-2.8 12.9-11.9 10.1-20.2L454.9 47.2c-2.8-8.4-11.9-12.9-20.2-10.1l-61.1 20.4 33.1 99.4L346 177l-33.1-99.4-61.6 20.5c-8.4 2.8-12.9 11.9-10.1 20.2l53 159.4zm281 48.7L565 296c-2.8-8.4-11.9-12.9-20.2-10.1l-213.5 71.2c-17.2-22-43.6-36.4-73.5-37L158.4 21.9C154 8.8 141.8 0 128 0H16C7.2 0 0 7.2 0 16v32c0 8.8 7.2 16 16 16h88.9l92.2 276.7c-26.1 20.4-41.7 53.6-36 90.5 6.1 39.4 37.9 72.3 77.3 79.2 60.2 10.7 112.3-34.8 113.4-92.6l213.3-71.2c8.3-2.8 12.9-11.8 10.1-20.2zM256 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"></path></svg></p>
        <p class="cursor-pointer"><strong>{{$pedido->pedido_nro}}</strong></p>
        </div> 
        @if(Auth::user()->is_admin == 1)
        </a>  
        @endif
            <div>
                <div class="w-full flex-col justify-start align-middle text-center p-2 shadow ">
                    <label for="booking">N° Booking</label>
                    <p id="booking" name="booking" disabled class="rounded border-none bg-gray-300 cursor-pointer">{{$pedido->barco_nro_contenedor}}</p>
                </div>
                <div class="w-full flex-col justify-start align-middle text-center p-2  shadow ">           
                    
                    <label for="salida"> Semana de salida: </label>
                    <p id="salida" name="salida" disabled class="rounded border-none bg-gray-300 cursor-pointer" >{{$pedido->semana_salida}}</p>        
                </div>
            </div>
            <!-- botonera -->
        
            <hr>
            <br>
        <div class="flex-col pb-1">
        <div class="w-full align-middle -mt-3">
            @if(Auth::user()->is_admin == 1)
            <a href="{{route('pedidoEdit', $pedido->id)}}">
            @endif
                @if($pedido->estado == 1)
                <button class="rounded w-full p-2 bg-yellow-100 ">Preparacion</button>
                @elseif($pedido->estado == 2)
                <button class="rounded w-full p-2 bg-yellow-300 ">In Transit</button>
                @elseif($pedido->estado == 3)
                <button class="rounded w-full p-2 bg-green-600 text-gray-50">Entregado</button>
                @else
                <button class="rounded w-full p-2 bg-red-600 text-gray-50">Sin Estado</button>
                @endif
            @if(Auth::user()->is_admin == 1)
            </a>
            @endif
            </div>

            @if(Auth::user()->is_admin == 1)
            <div class="flex flex-grow-0 justify-center rounded align-middle pt-2">
                @livewire('button', ['href' => "{{route('pedidoEdit', $pedido->id)}}", 'color' => "gray", 'operation' => "edit"])
                @if(!$pedido->trashed())
                    @livewire('button', ['href' => "{{route('pedidoDelete', $pedido->id)}}", 'color' => "gray", 'operation' => "trash"])
                @else
                @livewire('button', ['href' => "{{route('pedidoDelete', $pedido->id)}}", 'color' => "gray", 'operation' => "recover"])
                @endif
            </div>
        @endif
        </div>
</div>
   