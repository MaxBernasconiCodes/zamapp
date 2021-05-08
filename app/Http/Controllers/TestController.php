<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function singleUser()
    {
        User::factory()->create();
        return redirect('/');
    }
    public function lotsUsers($ammount)
    {
        User::factory()->count($ammount)->create();
        return redirect('/');
    }
    public function admin()
    {
        if(!User::where('email', '=' ,'admin@admin')->exists())
        {
            User::factory()->create(['email'=> 'admin@admin', 'is_admin' => '1']);
            return redirect('/');
        }
        return redirect('/');
    }

}
