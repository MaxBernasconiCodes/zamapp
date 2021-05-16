<div>
    <tr>
        <td class="p-2 cursor-pointer">
        <a href="{{route('pedidoEdit', $pedido->id)}}">
            <label class="cursor-pointer"><strong>{{$pedido->pedido_nro}}</strong></label>
            <br>
            <label class="cursor-pointer">{{$pedido->semana_salida}}</label>
        </td>
        </a>
        <td class="p-2 cursor-pointer">
            
            @if(!is_Null($pedido->user))
            <a href="{{route('usersEdit', $pedido->user_id)}}">
            <label class="cursor-pointer"><strong>{{$pedido->user->business}}</strong></label>
            <br>
            <label class="cursor-pointer">{{$pedido->user->name}}</label>
            </a>
            @else
            <label><strong>
            {{$cliente->business}}</strong></label>
            <br>
            <label>{{$cliente->name}}</label>
            @endif
        </td>
        <td class="p-2">
            <label>{{$pedido->barco_nombre}}</label>
            <br>
            <label>{{$pedido->barco_nro_contenedor}}</label>
        </td>
        <td class="p-1">
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
        <td class="p-1">
            <form id="edit_{{$pedido->id}}" action="{{url('/pedidos/edit/'.$pedido->id)}}" method="GET" class="inline">@csrf <button class="bg-blue-800 text-blue-200   font-semibold px-2 rounded-l-full  ">Editar</button></form>
            @if(!$pedido->trashed())
                    <form id="delete_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-red-800 text-red-200   font-semibold px-2 rounded-r-full  ">Eliminar</button></form>
            @else
                <form id="reactivate_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-yellow-800 text-yellow-200   font-semibold px-2 rounded-r-full  ">Reactivar</button></form>
            @endif
        </td>
    </tr>
</div>
