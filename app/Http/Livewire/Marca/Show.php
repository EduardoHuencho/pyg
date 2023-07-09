<?php

namespace App\Http\Livewire\Marca;

use Livewire\Component;
use App\Models\Marca;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $open_edit = false;
    public $open_del = false;
    public $cant = '10';
    public $marca;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc']
    ];
    protected $listeners = [
        'render' => 'render',
        'delete' => 'delete'
    ];

    protected $rules = [
        'marca.nombre' => 'required|max:100'
    ];

    public function order($sort){
        if ($this->sort == $sort){
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        } else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function render()
    {

        $marcas = Marca::where('nombre', 'like', '%' . $this->search . '%')
                        ->orwhere('id', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);

        return view('livewire.marca.show', compact('marcas'));
    }
    
    public function edit(Marca $marca){
        $this->marca = $marca;
        $this->open_edit = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function update(){
        $this->validate();

        $this->marca->save();

        $this->reset(['open_edit']);

        $this->emit('alert', 'La Marca Fue Editada De Forma Exitosa!');
    }

    public function delete(Marca $marca){
        $marca->delete();
    }

}
