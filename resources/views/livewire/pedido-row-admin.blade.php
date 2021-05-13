<div>
    <tr>
        <td class="p-2">
            <label>{{$pedido->pedido_nro}}</label>
            <br>
            <label>{{$pedido->semana_salida}}</label>
        </td>
        <td class="p-2">
            <label><b>{{$pedido->user->business}}</b></label>
            <br>
            <label>{{$pedido->user->name}}</label>
        </td>
        <td class="p-2">
            <label>{{$pedido->barco_nombre}}</label>
            <br>
            <label>{{$pedido->barco_nro_contenedor}}</label>
        </td>
        <td class="p-1">
            @if($pedido->estado == 1)
                <button class="rounded w-full p-2 bg-yellow-100 ">Preparacion</button>
        @elseif($pedido->estado == 2)
                <button class="rounded w-full p-2 bg-yellow-300 ">In Transit</button>
        @elseif($pedido->estado == 3)
                <button class="rounded w-full p-2 bg-green-600 text-gray-50">Entregado</button>
        @else
                <button class="rounded w-full p-2 bg-red-600 text-gray-50">Sin Estado</button>
        @endif
        <td class="p-1">
            <form id="edit_{{$pedido->id}}" action="{{url('/pedidos/edit/'.$pedido->id)}}" method="POST" class="inline">@csrf <button class="bg-blue-800 text-blue-200   font-semibold px-2 rounded-l-full  ">Editar</button></form>
            @if(!$pedido->trashed())
                    <form id="delete_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-red-800 text-red-200   font-semibold px-2 rounded-r-full  ">Eliminar</button></form>
            @else
                <form id="reactivate_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-yellow-800 text-yellow-200   font-semibold px-2 rounded-r-full  ">Reactivar</button></form>
            @endif
        </td>
    </tr>
</div>
