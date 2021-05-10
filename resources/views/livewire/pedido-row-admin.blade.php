<div>
    <tr>
        <td>
            <label>{{$pedido->pedido_nro}}</label>
            <br>
            <label>{{$pedido->semana_salida}}</label>
        </td>
        <td>
            <label><b>{{$pedido->user->business}}</b></label>
            <br>
            <label>{{$pedido->user->name}}</label>
        </td>
        <td>
            <label>{{$pedido->barco_nombre}}</label>
            <br>
            <label>{{$pedido->barco_nro_contenedor}}</label>
        </td>
        <td>
            @if($pedido->estado == 0)
                <label class="rounded p-2 bg-yellow-100 ">Preparacion</label>
        @elseif($pedido->estado == 1)
                <label class="rounded p-2 bg-yellow-300 ">In Transit</label>
        @elseif($pedido->estado == 2)
                <label class="rounded p-2 bg-green-600 text-gray-50">Entregado</label>
        @else
                <label class="rounded p-2 bg-red-600 text-gray-50">Sin Estado</label>
        @endif
        <td>
            @if(!$pedido->trashed())
                    <form id="delete_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-red-800 text-red-200   font-semibold px-2 rounded-r-full  ">Eliminar</button></form>
            @else
                <form id="reactivate_{{$pedido->id}}" action="{{url('/pedidos/delete/'.$pedido->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class="bg-yellow-800 text-yellow-200   font-semibold px-2 rounded-r-full  ">Reactivar</button></form>
            @endif
        </td>
    </tr>
</div>
