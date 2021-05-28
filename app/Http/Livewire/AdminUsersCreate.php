<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AdminUsersCreate extends Component
{
    use PasswordValidationRules;

    public $business = '';    
    public $name = '';          
    public $cuit = '';           
    public $phone = '';         
    public $adress = '';        
    public $country = '';     
    public $email;        
    public $password;  
    public $password_confirmation; 
    public $is_admin = 0;  
    public $confirmacion = false; 

    public function render()
    {
        return view('livewire.admin-users-create');
    }
    
    public function store()
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
                    'email'     => 'required|string|email|max:255|unique:users',
                    'password'  => 'required|between:8,255|confirmed',
                ]);
                User::create([
                    'business'  => $this->business,
                    'name'      => $this->name,
                    'cuit'      => $this->cuit,
                    'phone'     => $this->phone,
                    'adress'    => $this->adress,
                    'country'   => $this->country,
                    'email'     => $this->email,
                    'password'  => Hash::make($this->password),
                    'is_admin'  => 1,
                ]);
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
                        'email'     => 'required|string|email|max:255|unique:users',
                        'password'  => $this->passwordRules(),
                        ]);

                        User::create([
                        'business'  => $this->business,
                        'name'      => $this->name,
                        'cuit'      => $this->cuit,
                        'phone'     => $this->phone,
                        'adress'    => $this->adress,
                        'country'   => $this->country,
                        'email'     => $this->email,
                        'password'  => Hash::make($this->password),
                        'is_admin'  => 0,
                        ]);
                }
    }

    public function resetform()
    {
        $this->business = '';
        $this->name = '';
        $this->cuit = '';       
        $this->phone = '';      
        $this->adress = '';    
        $this->country = '';   
        $this->email = null;      
        $this->password = null;   
        $this->is_admin = 0;  
        $this->confirmacion = false; 
    }

    public function toggleAdmin()
    {
        $this->is_admin == 1 ? $this->is_admin = 0 : $this->is_admin = 1; 
    }

    public function solicitar()
    {
        $this->confirmacion  ? $this->confirmacion = false : $this->confirmacion = true; 
    }

}
