<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function singleUser()
    {
        User::factory()->create();      
    }
    public function lotsUsers($ammount)
    {
        User::factory()->count($ammount)->create();      
    }
    public function admin()
    {
        if(!User::where('email', '=' ,'admin@admin')->exists())
        {
            User::factory()->create(['email'=> 'admin@admin', 'is_admin' => '1']);          
        }
        
    }
    public function singlePedido()
    {
        Pedido::factory()->create();        
    }
    public function lotsPedidos($ammount)
    {
        Pedido::factory()->count($ammount)->create();
    }
}
