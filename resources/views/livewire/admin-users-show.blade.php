<div>
<div class="bg-zam-light  text-xl p-3 shadow-lg" >
    <h5><strong>Empresa:</strong> {{$usuarioactual->business}}</h5>
    <h5><strong>Responsable:</strong> {{$usuarioactual->name}}</h5>
</div>   
<div class="flex flex-row flex-wrap justify-center lg:justify-start p-4 ">
@forelse($pedidos as $pedido)
<div class="m-2 w-68 h-68 bg-zam-light rounded-lg flex flex-col justify-evenly  text-xl text-center shadow-lg hover:shadow-2xl ease-in-out overflow-x-hidden ">
    <label><strong>N°:</strong>{{$pedido->pedido_nro}}</label>
    <a href="{{route('adminPedidosEdit', $pedido->id)}}" class="w-full flex flex-wrap justify-center items-center  text-lg  overflow-x-hidden
            p-2
            @if($pedido->estado == 1)
            bg-zam-dark text-zam-light "><i class="fas fa-people-carry"></i> <label class="ml-1 hidden md:inline">Preparacion</label>
            @elseif($pedido->estado == 2)
            bg-zam-dark text-zam-alert "><i class="fas fa-shipping-fast"></i> <label class="ml-1 hidden md:inline">In Transit</label>
            @elseif($pedido->estado == 3)
            bg-zam-dark text-zam-green "><i class="far fa-check-square"></i> <label class="ml-1 hidden md:inline">Entregado</label> <br><label class="ml-1">{{$pedido->fecha_estado}}</label>
            @else
            bg-zam-dark text-zam-danger "> X <label class="ml-1 hidden md:inline">Sin Estado</label>
            @endif
            </a>
    <input type="week" value="{{$pedido->semana_salida}}"></label>
    <label><strong>Booking: </strong><br>{{$pedido->barco_nro_booking}}</label>
    <label><strong>Contenedor: </strong><br>{{$pedido->barco_nro_contenedor}}</label>
    <hr>
    <div class="flex flex-row justify-evenly p-1" style="position: relative">
    <a href="{{route('adminPedidosEdit', $pedido->id)}}"> <button class="text-zam-dark text-2xl hover:text-zam-green ease-in-out"><i class="fas fa-edit"></i></button></a>
    <button class="text-zam-dark text-2xl hover:text-zam-green ease-in-out"><i class="fas fa-trash"></i></button>
    </div>
</div>


@empty
<div class="w-full flex flex-row justify-center bg-zam-alert text-2xl p-5"><h2> Sin Pedidos </h2></div>

@endforelse
<div class="flex flex-row justify-center w-full">
<?php echo $pedidos->render(); ?> 
</div>

</div>
