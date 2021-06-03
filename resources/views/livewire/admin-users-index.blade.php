<div style="min-width: 741px;">
<div class="bg-zam-light text-xl  min-w-min ">
    <div class="bg-zam-white">
            @if(Auth::user()->is_admin == 1)
            
            <div class="grid grid-cols-12 mx-auto" style='border-bottom: 2px solid #eaeaea'>
                <div class="col-span-1"></div>
	            <div class='flex col-span-2 cursor-pointer'>
                    <label for="isnotadmin" class=' flex flex-col align-bottom py-2 px-6 bg-white rounded-t-lg @if($is_admin == 0) text-zam-green bold bg-zam-gray @endif ease-in-out duration-150 hover:bg-zam-dark hover:text-zam-light'>Clientes</label>
                    <label for="isadmin" class=' flex py-2 px-6 bg-white rounded-t-lg @if($is_admin == 1) text-zam-green bold bg-zam-gray @endif ease-in-out duration-150 hover:bg-zam-dark hover:text-zam-light'>Admins</label>
                    <input type="radio" name="is_admin" wire:model="is_admin" id="isadmin" value="1" class="hidden" >
                    <input type="radio" name="is_admin" wire:model="is_admin" id="isnotadmin" value="0" class="hidden">
                </div>
                <div class="col-span-6"></div>
                <div class='flex col-span-2 cursor-pointer '>    
                    <a href="{{route('adminUsersCreate')}}"
                     class="p-2 rounded-lg text-2xl text-zam-dark hover:text-zam-green "><i class="fas fa-user-plus"></i> Nuevo Usuario
                    </a>
                </div>
                <div class="col-span-1"></div>
                
            </div>
            
            @else
                <div>
                    {{ __('Usuarios') }}
                </div>
            @endif  
    </div>

<!-- filtros -->
    <form class="font-roboto bg-zam-white " action="{{route('adminUsersIndex', 4)}}" method="get">
    <div class="grid grid-cols-12 p-2 mb-2 mx-auto">
            <div class="grid col-span-1 ">
            </div>
        <div class="flex flex-col col-span-3">
            <input wire:model="business" list="empresas" name="business" id="business" class="rounded-lg m-1 shadow p-2 border border-black " placeholder="Empresa">
            <datalist id="empresas">
            @forelse($usuarios as $cliente)
            <option value="{{$cliente->business}}" />
            @empty
            @endforelse
            </datalist>
        </div>
        <div class="flex flex-col col-span-3 max-w-full">
            <input wire:model="name" list="responsables" name="name" id="name" class="rounded-lg m-1 shadow p-2 border border-black" placeholder="Responsable">
            <datalist id="responsables">
            @forelse($usuarios as $cliente)
            <option value="{{$cliente->name}}" />
            @empty
            @endforelse
            </datalist>
        </div>
        <div class="grid col-span-1 p-1 max-w-full">
        </div>
        <div class="grid col-span-1 sm:hidden">
        </div>
        
    </div>
    </form>
    <hr>
    <!-- each row -->
        @forelse($data as $cliente)
        <div class=" hover:border-zam-green border border-transparent grid grid-cols-12 gap-2 mx-auto py-2 px-6 odd:bg-gray-200 ">
        <div class="col-span-1  py-1  cursor-pointer">
        </div>
            <div class="flex flex-col col-span-3 py-1 cursor-pointer overflow-x-auto">
            <a href="{{route('adminUsersShow', $cliente->id)}}">
                <div class="cursor-pointer"><strong>Empresa:</strong> {{$cliente->business}}</div>
                <div class="cursor-pointer"><strong>Responsable:</strong>: {{$cliente->name}}</div>
                </a>
            </div>
        

        <div class="flex  flex-col col-span-5 py-1 cursor-pointer overflow-x-auto">
            <div class="flex items-baseline flex-row"><i class="fas fa-envelope  mr-1"></i><p> {{ $cliente->email}}  </p>  </div>
            <div class="flex items-baseline flex-row"><i class="fas fa-phone mr-1"></i><p> {{ $cliente->phone}} </p>   </div>
        </div>
        <div class="col-span-2 font-roboto font-medium  grid grid-rows-2 grid-cols-2 gap-1 justify-center text-center py-1 cursor-pointer">
           
        
        
            
            <button class="hover:text-zam-green col-span-1 mx-auto  text-zam-dark rounded-lg w-full p-1">
            <a href="{{route('adminUsersEdit', $cliente->id)}}">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="mx-auto svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg>
            </a>
            </button>
            
            @if(!$cliente->trashed())
                @if($confirmando===$cliente->id)
                <button wire:click="kill({{ $cliente->id }})" class="hover:bg-zam-danger hover:text-zam-white text-sm col-span-1 mx-auto bg-zam-danger text-zam-light rounded-lg w-full   p-1 border border-black">
                 ¿Eliminar? 
                </button>
                @else
                <button wire:click="confirm({{ $cliente->id }})" class="hover:text-zam-green col-span-1 mx-auto  text-zam-dark rounded-lg w-full p-1">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="mx-auto svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                </button>
                @endif
            @else
                @if($confirmando===$cliente->id)
                <button wire:click="recover({{ $cliente->id }})" class="hover:bg-zam-green hover:text-zam-dark text-sm col-span-1 mx-auto bg-zam-green text-zam-dark rounded-lg w-full   p-1 border border-black">
                 ¿Restaurar? 
                </button>
                @else
                <button wire:click="confirm({{ $cliente->id }})" class="hover:bg-zam-dark hover:text-zam-light col-span-1 mx-auto bg-zam-alert text-zam-light rounded-lg w-full   p-1 border border-black">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-restore" class="mx-auto svg-inline--fa fa-trash-restore fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="1.5rem" heigth="1.5rem" viewBox="0 0 448 512"><path fill="currentColor" d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                </button>
                @endif
            @endif
            
            
        </div>   
        <div class="col-span-1  py-1  cursor-pointer">
        </div>     
</div>
        @empty
            
        @endforelse
    </div> 
    <div class="flex justify-center  text-center p-5">
            <?php echo $data->render(); ?>      
    </div>
    
</div>
</div>
