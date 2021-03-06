<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <div>
            <x-jet-authentication-card-logo />
        </div>
        </x-slot>
        

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
            <span class="flex flex-row"><x-jet-label for="password" value="{{ __('Contraseña') }}" />
            <label onclick="reveal()" class="ml-2 cursor-pointer ">
            <i id="eyeopen" class="far fa-eye"></i>
            <i id="eyeclosed" class="far fa-eye-slash hidden"></i>
            </label>
            </span>
                <x-jet-input id="password" class="inline mt-1 w-full rounded-l" type="password" name="password" required autocomplete="current-password" />
            </div>


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvido su contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
       <script>
       var watch=false;
         function reveal() {
             var open = document.getElementById("eyeopen");
             open.classList.toggle("hidden");   
             var open = document.getElementById("eyeclosed");
             open.classList.toggle("hidden");
             if(!watch)
             {   
                document.getElementById('password').type = 'text';
             }
             else{
                document.getElementById('password').type = 'password';
             }    
             watch = !watch;      
         }
       </script>
    </x-jet-authentication-card>
    
    
</x-guest-layout>
