<div>
    <tr>
        <td class="px-6 py-4 cursor-pointer">
        <a href="{{route('pedidoEdit', $pedido->id)}}">
            <label class="cursor-pointer"><strong>{{$pedido->pedido_nro}}</strong></label>
            <br>
            <label class="cursor-pointer">{{$pedido->semana_salida}}</label>
        </a>
        </td>
        
        <td class="px-6 py-4">
            <label>{{$pedido->barco_nombre}}</label>
            <br>
            <label>{{$pedido->barco_nro_contenedor}}</label>
        </td>
        <td class="px-6 py-4">
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
        </td>
    </tr>
</div>
