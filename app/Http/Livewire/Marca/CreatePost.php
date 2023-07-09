<?php

namespace App\Http\Livewire\Marca;

use App\Models\Marca;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false;
    public $nombre;
    protected $rules = [
        'nombre' => 'required|max:100'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        
        $this->validate();

        Marca::create([
            'nombre' => $this->nombre
        ]);

        $this->reset(['open', 'nombre']);

        $this->emit('render');
        $this->emit('alert', 'La Marca Fue Agregada De Forma Exitosa!');

    }

    public function render()
    {
        return view('livewire.marca.create-post');
    }

    public function updatingOpen(){
        if ($this->open==false){
            $this->reset(['nombre']);
        }
    }

}
