<div>
<tr class="sm:cursor-pointer sm:select-none md:select-auto">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3 max-w-md overflow-auto">
                            @if(!empty($usuario->photoid))
                            <div class="inline-flex w-10 h-10">
                                <img loading="lazy" class='w-10 h-10 object-cover rounded-full' alt='IMG' src='/storage/logozam.svg' >
                            </div>
                            @endif
                            <a href="{{route('usersShow', $usuario->id)}}">
                                <p class="font-bold">
                                    {{$usuario->name}}
                                </p>
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                    {{$usuario->business}}
                                </p>
                            </div>
                            </a>
                            <div>
                        </div>
                    </td>
                    <td class="px-6 py-4" >
                        <p class="">
                            <i class="fas fa-phone"></i> {{ $usuario->phone}}
                        </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            <i class="fas fa-envelope"></i> {{ $usuario->email}}
                        </p>
                    </td>
                    <td >
                    <div class="flex flex-wrap justify-around rounded ">
                        @if($usuario->deleted_at == null)
                        <a class="text-green-800 bg-green-200 font-semibold text-center w-full py-2 px-2 rounded">
                            Activo
                        </a>
                        @else
                        <a class="text-red-200 bg-red-800 font-semibold text-center w-full py-2 px-2 rounded">
                            Eliminado
                        </a>
                        @endif
                    </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($usuario->is_admin)
                        <a class="text-red-800 border-red-200 border-2 font-semibold text-center w-full py-2 px-2 rounded">
                            Admin
                        </a>
                        @else
                        <a class="text-blue-800 border-blue-200 border-2 font-semibold text-center w-full py-2 px-2 rounded">
                        Cliente
                        </a>
                        @endif
                    </td>
                    <td>
                    <div class="flex flex-wrap justify-around rounded py-2">
                        <a id="edit__{{$usuario->id}}" href="{{route('usersEdit', $usuario->id)}}"  class="text-center rounded w-1/2 bg-blue-800 text-blue-200 p-2"> Editar </a>
                        @if(!$usuario->trashed())
                            @if(\Illuminate\Support\Facades\Auth::user()->id != $usuario->id)
                            <form id="delete_{{$usuario->id}}" action="{{route('usersDelete', $usuario->id)}}" method="POST" class=" flex rounded w-1/2">@csrf @method('DELETE') <button class="w-full rounded bg-red-800 text-red-200 p-2">Eliminar</button></form>
                            @endif
                            @else
                            <form id="reactivate_{{$usuario->id}}" action="{{route('usersDelete', $usuario->id)}}" method="POST" class="inline">@csrf @method('DELETE') <button class=" w-full rounded bg-yellow-800  text-yellow-200 p-2">Reactivar</button></form>
                        @endif
                        </div>
                    </td>
                </tr>
</div>
