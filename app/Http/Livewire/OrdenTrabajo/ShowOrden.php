<?php

namespace App\Http\Livewire\OrdenTrabajo;

use App\Models\Cliente;
use App\Models\Manoobra;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Producto;
use App\Models\Vehiculo;
use Livewire\Component;

class ShowOrden extends Component
{

    public function render()
    {
        $vehiculos = Vehiculo::orderBy('patente', 'asc')->get();
        $productos = Producto::orderBy('cod_prod', 'asc')->get();
        $manoobras = Manoobra::orderBy('nombre', 'asc')->get();
        return view('livewire.orden-trabajo.show-orden', [
            'vehiculos' => $vehiculos,
            'productos' => $productos,
            'manoobras' => $manoobras,
        ]);
        //return view('livewire.orden-trabajo.show-orden', compact('vehiculos'), compact('productos'));
    }

    public $selectedPatente;
    public $anio;
    public $rut;
    public $modelo_v;
    public $modelo_id;
    public $marca_v;
    public $nombre;
    public $tipo;
    public $telefono;
    public $celular;
    public $correo;
    public $selectedProd;
    public $precio_prod;
    public $selectedMano;
    public $precio_mano;
    public $cantidad;
    public $precio_total;

    public function calcularPrecioTotal(){
        $this->precio_total = $this->cantidad * $this->precio_prod;
    }

    public function updateDataAndCalcularPrecioTotal(){
        $this->updateData();
        $this->calcularPrecioTotal();
    }

    public function mount(){
        if ($this->selectedPatente) {
            // Obtener los datos de la base de datos
            $vehiculo = Vehiculo::where('patente', $this->selectedPatente)->first();
            

            // Verificar si se encontró el vehículo
            if ($vehiculo) {
                // Asignar los valores a las propiedades del componente
                $this->anio = $vehiculo->anio;
                $this->rut = $vehiculo->rut;
                $this->modelo_v = $vehiculo->modelo_id;
                $modelo = Modelo::where('id', $this->modelo_v)->first();
                $this->modelo_v = $modelo->nombre;
                $this->modelo_id = $modelo->id;
                $marca = Marca::where('id', $this->modelo_id)->first();
                $this->marca_v = $marca->nombre;
                $cliente = Cliente::where('rut', $this->rut)->first();
                $this->nombre = $cliente->nombre;
                $this->tipo = $cliente->tipo;
                $this->telefono = $cliente->telefono;
                $this->celular = $cliente->celular;
                $this->correo = $cliente->correo;
            } else {
                $this->anio = "";
                $this->rut = "";
                $this->marca_v = "";
                $this->modelo_v = "";
                $this->nombre = "";
                $this->tipo = "";
                $this->telefono = "";
                $this->celular = "";
                $this->correo = "";
            }
        }elseif($this->selectedPatente == "none") {
            $this->anio = "";
            $this->rut = "";
            $this->marca_v = "";
            $this->modelo_v = "";
            $this->nombre = "";
            $this->tipo = "";
            $this->telefono = "";
            $this->celular = "";
            $this->correo = "";
        }

        if ($this->selectedProd) {
            $producto = Producto::where('cod_prod', $this->selectedProd)->first();
            if ($producto) {
                $this->precio_prod = $producto->precio;
            } else {
                $this->precio_prod = "";
            }
        }elseif($this->selectedProd == "none") {
            $this->precio_prod = "";
        }

        if ($this->selectedMano) {
            $manoobra = Manoobra::where('nombre', $this->selectedMano)->first();
            if ($manoobra) {
                $this->precio_mano = $manoobra->costo;
            } else {
                $this->precio_mano = "";
            }
        }elseif($this->selectedMano == "none") {
            $this->precio_mano = "";
        }

    }

    public function updateData()
    {
        $this->mount();
    }               

}
