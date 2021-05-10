<div>
    <tr>
        <td>
            <label>{{$pedido->pedido_nro}}</label>
            <label>{{$pedido->semana_salida}}</label>
        </td>
        <td>
            <label>{{$pedido->user->business}}</label>
            <br>
            <label>{{$pedido->user->name}}</label>
        </td>
        <td>
            <label>{{$pedido->barco_nombre}}</label>
            <br>
            <label>{{$pedido->barco_nro_contenedor}}</label>
        </td>
        <td>
            <label>{{$pedido->estado}}</label>
        </td>
        <td>
            <a href="/pedidos/edit/{{$pedido->id}}">Editar</a>
            <a href="/pedidos/delete/{{$pedido->id}}">Eliminar</a>
        </td>
    </tr>
</div>
