<?php

namespace App\Http\Livewire\Search;

use App\Models\Cliente;
use Livewire\Component;

class Clientes extends Component
{

    public $showdiv = false;
    public $nombre_completo;
    public $doc;
    public $cliente_id;
    public $clientes;
    public $search;
    public $selected;

    public function SelectCliente($id = 0){

        $r = Cliente::find($id);
        $this->cliente_id = $r->id;
        $this->nombre_completo = $r->nombre_completo;
        $this->doc = $r->doc;
        $this->selected = $r->doc;
        $this->showdiv = false;
        $this->search = "";
    }


    public function SearchResult(){
        if(!empty($this->search)){
            $searchTerm = '%'.$this->search.'%';
            $this->clientes = Cliente::orderBy('nombre_completo','asc')
            ->where('doc','like',$searchTerm)
            ->orWhere('nombre_completo','like',$searchTerm)->offset(0)->limit(10)
            ->get();
                $this->showdiv = true;
        }
        else{
            $this->showdiv = false;
        }
    }


    public function render()
    {
        return view('livewire.search.clientes');
    }
}
