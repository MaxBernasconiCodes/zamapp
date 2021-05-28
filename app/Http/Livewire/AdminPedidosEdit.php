<?php

namespace App\Http\Livewire;

use App\Models\Pedido;
use App\Models\User;
use App\Models\document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;



class AdminPedidosEdit extends Component
{
    use WithFileUploads;

    public $pedido_id;

    public $solicitado = false;
    public $archivoConfirm = false;
    public $porquitar = null;


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

    public $documento;
    
    public function mount()
    {
        $pedido = Pedido::find($this->pedido_id);
        $this->user_id = $pedido->user_id;
        $this->agencia = $pedido->agencia;
        $this->despachante = $pedido->despachante;
        $this->consolidacion = $pedido->consolidacion;
        $this->destino = $pedido->destino;
        $this->contenedores = $pedido->contenedores;
        $this->descripcion = $pedido->descripcion;
        $this->pedido_nro = $pedido->pedido_nro;
        $this->semana_salida = $pedido->semana_salida;
        $this->fecha_cortedocumental = $pedido->fecha_cortedocumental;
        $this->fecha_cortefisico = $pedido->fecha_cortefisico;
        $this->barco_nombre = $pedido->barco_nombre;
        $this->barco_contenedores = $pedido->barco_contenedores;
        $this->barco_nro_contenedor = $pedido->barco_nro_contenedor;
        $this->barco_nro_remito = $pedido->barco_nro_remito;
        $this->barco_nro_booking = $pedido->barco_nro_booking;
        $this->fecha_destino = $pedido->fecha_destino;
        $this->estado = $pedido->estado;
        
    }

    public function render()
    {
        $clientes = User::where('is_admin', 0)->orderBy('name')->get();
        $pedido = Pedido::find($this->pedido_id);
        $documentos = $pedido->documents()->get();
        return view('livewire.admin-pedidos-edit', compact('clientes', 'documentos'));
    }

    public function update()
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
        if ($this->pedido_id) {
        $toupdate = Pedido::find($this->pedido_id);
        $toupdate->update([
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
        }
    }
    public function confirmacion ()
    {
        $this->solicitado = !$this->solicitado;
    }

    public function resetform()
    {
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
    
    public function Agregarconfirm()
    {
        if(!is_null($this->documento))
        {
            $this->archivoConfirm = true;
        }
        
    }

    public function AgregarArchivos()
    {
        $direccion = $this->documento->store('documentos');
        if(!is_null($direccion))
        {
            $this->validate(
                [
                    'documento' => 'required|file|mimes:xml,xls,xlsm,xlsx,pdf|max:102400',
                    'pedido_id' => 'required|numeric',
                    
                ]
                );
        document::create(
            [
                'original' => $this->documento->getClientOriginalName(),
                'direccion' => $direccion,
                'pedido_id' => $this->pedido_id,
                'descargado' => false,
            ]
            );
        }
        else{
            $this->documento = null;
        }
        $this->documento = null;
        $this->archivoConfirm = false;
    }

    public function aquitar($id)
    {
        $this->porquitar = $id;
    }

    public function anularupload()
    {
        $this->documento = null;
    }

    public function quitardoc($id)
    {
        $documentdel = document::findOrFail($id);
        $file_path  = $documentdel->direccion;
        Storage::disk('documentos')->delete($file_path);
        $documentdel->delete();
        $this->documento = null;
        $this->archivoConfirm = false;
        $this->porquitar = null;
    }
}
