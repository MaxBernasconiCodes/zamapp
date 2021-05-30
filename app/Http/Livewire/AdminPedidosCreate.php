<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;

class AdminPedidosCreate extends Component
{
    public $latestnumber;
    public $solicitado = false;
    public $user_id;
    public $agencia;
    public $despachante;
    public $consolidacion;
    public $destino;
    public $contenedores;
    public $descripcion;
    public $pedido_nro;
    public $semana_salida;
    public $fecha_cortedocumental;
    public $fecha_cortefisico;
    public $barco_nombre;
    public $barco_contenedores;
    public $barco_nro_contenedor;
    public $barco_nro_remito;
    public $barco_nro_booking;
    public $fecha_destino;
    public $estado;

    public function mount()
    {
        $clientes = User::where('is_admin', 0)->orderBy('name')->get();
        if(!is_null($clientes->first())){
            $this->user_id = $clientes->first()->id;
        }

        $lastpedido = Pedido::latest()->first();
        if(!is_null($lastpedido))
        {
            $this->latestnumber = $lastpedido->pedido_nro;
        }
        else{
            $this->latestnumber = 0;
        }
        $this->latestnumber++;
        
        if(!Pedido::exists())
        {
            $this->pedido_nro = 1;
        }
        
        else{
            $this->pedido_nro = $this->latestnumber;
        }
        $this->estado = 1;
    }
    public function render()
    {
        $clientes = User::where('is_admin', 0)->orderBy('name')->get();
        return view('livewire.admin-pedidos-create', compact('clientes'));
    }

    public function store()
    {
        $this->solicitado = false;
        $this->validate([
            'user_id' => 'required|numeric',
            'agencia' => 'required|min:3',
            'despachante' => 'required|min:3',
            'consolidacion' => 'required|min:3',
            'destino' => 'required|min:3',
            'contenedores' =>'required|numeric',
            'descripcion' => [],
            'pedido_nro' => 'required|numeric',
            'semana_salida' => 'required',
            'fecha_cortedocumental' => 'required|date',
            'fecha_cortefisico' => 'required|date',
            'barco_nombre' => 'required|min:3',
            'barco_contenedores' => 'required|numeric',
            'barco_nro_contenedor' => 'required',
            'barco_nro_remito' => 'required',
            'barco_nro_booking' => 'required',
            'fecha_destino' => 'required|date',
            'estado' => 'required|numeric',

        ]);
        Pedido::create([
            'user_id' => $this->user_id,
            'agencia' => $this->agencia,
            'despachante' => $this->despachante,
            'consolidacion' => $this->consolidacion,
            'destino' => $this->destino,
            'contenedores' => $this->contenedores,
            'descripcion' => $this->descripcion,
            'pedido_nro' => $this->pedido_nro,
            'semana_salida' => $this->semana_salida,
            'fecha_cortedocumental' => $this->fecha_cortedocumental,
            'fecha_cortefisico' => $this->fecha_cortefisico,
            'barco_nombre' => $this->barco_nombre,
            'barco_contenedores' => $this->barco_contenedores,
            'barco_nro_contenedor' => $this->barco_nro_contenedor,
            'barco_nro_remito' => $this->barco_nro_remito,
            'barco_nro_booking' => $this->barco_nro_booking,
            'fecha_destino' => $this->fecha_destino,
            'estado' => $this->estado,
        ]);
        $this->resetform();
        $this->dispatchBrowserEvent('notificacion', ['message' => 'Pedido creado exitosamente!']);
        
    }
    public function confirmacion ()
    {
        $this->solicitado = !$this->solicitado;
    }

    public function resetform()
    {
        $this->pedido_nro = $this->latestnumber;
        $this->solicitado = false;
        $this->user_id = null;
        $this->agencia = null;
        $this->despachante = null;
        $this->consolidacion = null;
        $this->destino = null;
        $this->contenedores = null;
        $this->descripcion = null;
        $this->pedido_nro = null;
        $this->semana_salida = null;
        $this->fecha_cortedocumental = null;
        $this->fecha_cortefisico = null;
        $this->barco_nombre = null;
        $this->barco_contenedores = null;
        $this->barco_nro_contenedor = null;
        $this->barco_nro_remito = null;
        $this->barco_nro_booking = null;
        $this->fecha_destino = null;
        $this->estado = null;
    
    }
    public function testtoast()
    {
        $this->dispatchBrowserEvent("notificacion");
    }
}
