<div>
    <nav id="testbar" class="w-full fixed bottom-0 left-0 bg-green-600 text-gray-900">
        <a href="{{route('factoryAdmin')}}" class="rounded border-r-2 no-underline"><label> Crear Admin </label> </a>
        <a href="{{route('factorySingleUser')}}" class="rounded border-r-2 no-underline"><label>+1 User </label></a>
        <a href="{{route('factoryUsers', ['amount'=> '10'])}}" class="rounded border-r-2 no-underline"><label> +10 Users </label></a>
        <a href="{{route('factoryUsers', ['amount'=> '50'])}}" class="rounded border-r-2 no-underline"><label> +50 Users </label></a>
        <a href="{{route('factorySinglePedido')}}" class="rounded border-r-2 no-underline"><label>+1 Pedido </label></a>
        <a href="{{route('factoryPedidos', ['amount'=>'10'])}}" class="rounded border-r-2 no-underline"><label> +10 Pedidos </label></a>
        <a href="{{route('factoryPedidos', ['amount'=>'50'])}}" class="rounded border-r-2 no-underline"><label> +50 pedidos </label></a>
    </nav>
</div>
