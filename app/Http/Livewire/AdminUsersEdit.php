<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AdminUsersEdit extends Component
{
    public $business                = '';    
    public $name                    = '';          
    public $cuit                    = '';
    public $consigne                = '';
    public $notify                  = '';
    public $phone                   = '';         
    public $adress                  = '';
    public $postalcode              = '';        
    public $country                 = '';     
    public $email                       ;        
    public $password                    ;  
    public $password_confirmation       ; 
    public $is_admin                = 0;  
    public $confirmacion            = false; 

    public function mount($id)
    {
        $usuario = User::withTrashed()->find($id);
        $this->business             =$usuario->business;
        $this->name                 =$usuario->name;
        $this->cuit                 =$usuario->cuit;
        $this->phone                =$usuario->phone;
        $this->adress               =$usuario->adress;
        $this->country              =$usuario->country;
        $this->email                =$usuario->email;
        $this->is_admin             =$usuario->is_admin;
        $this->confirmacion         = false;
    }

    public function render()
    {
        $clientes = User::where('is_admin', 0)->orderBy('name')->get();
        return view('livewire.admin-users-edit', compact('clientes'));
    }
    public function update()
    {
                /* Si es un Admin */
                if($this->is_admin == 1){
                $this->validate([
                    'business'  => 'string|max:255',
                    'name'      => 'required|string|max:255',
                    'cuit'      => 'string|max:255',
                    'phone'     => 'string|max:255',
                    'adress'    => 'string|max:255',
                    'country'   => 'string|max:255',
                ]);
                $toupdate = User::findOrFail($this->user_id);
                $toupdate->update([
                    'business'  => $this->business,
                    'name'      => $this->name,
                    'cuit'      => $this->cuit,
                    'consigne'  => $this->consigne,
                    'notify'    => $this->notify,
                    'phone'     => $this->phone,
                    'adress'    => $this->adress,
                    'postalcode'=> $this->postalcode,
                    'country'   => $this->country,
                    'is_admin'  => $this->is_admin,
                ]);
                $this->toast('success', ' Usuario actualizado correctamente');
                }

                /* Si es un usuario */
                else{
                    $this->validate([
                        'business'  => 'required|string|max:255',
                        'name'      => 'required|string|max:255',
                        'cuit'      => 'required|string|max:255',
                        'phone'     => 'required|string|max:255',
                        'adress'    => 'required|string|max:255',
                        'country'   => 'required|string|max:255',
                        ]);

                        $toupdate = User::find($this->user_id);
                        $toupdate->update([
                            'business'  => $this->business,
                            'name'      => $this->name,
                            'cuit'      => $this->cuit,
                            'consigne'  => $this->consigne,
                            'notify'    => $this->notify,
                            'phone'     => $this->phone,
                            'adress'    => $this->adress,
                            'postalcode'=> $this->postalcode,
                            'country'   => $this->country,
                            'is_admin'  => $this->is_admin,
                        ]);
                        $this->toast('success', ' Usuario actualizado correctamente');
                    }
    }

    public function toggleAdmin()
    {
        $this->is_admin == 1 ? $this->is_admin = 0 : $this->is_admin = 1; 
    }

    public function solicitar()
    {
        $this->confirmacion  ? $this->confirmacion = false : $this->confirmacion = true; 
    }

    public function toast($tipo,$mensaje)
    {
        $this->emit('alert', ['type' => $tipo, 'message' => $mensaje]);
    }
}
