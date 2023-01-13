<?php

namespace App\Http\Livewire\Search;

use App\Models\Cuenta;
use Livewire\Component;

class Cuentas extends Component
{

    public $showdiv = false;
    public $nombre;
    public $email_cuenta;
    public $cuenta_id;
    public $cuentas;
    public $search;
    public $selected;

    public function SelectCuenta($id = 0){

        $r = Cuenta::find($id);
        $this->cuenta_id = $r->id;
        $this->nombre = $r->nombre;
        $this->email_cuenta = $r->email_cuenta;
        $this->selected = $r->nombre;
        $this->showdiv = false;
        $this->search = "";
    }


    public function SearchResult(){
        if(!empty($this->search)){
            $searchTerm = '%'.$this->search.'%';
            $this->cuentas = Cuenta::orderBy('nombre','asc')
            ->where('nombre','like',$searchTerm)
            ->orWhere('email_cuenta','like',$searchTerm)
            ->where('cuentas_disponibles','>',0)
            ->offset(0)->limit(10)
            ->get();
            $this->showdiv = true;
        }
        else{
            $this->showdiv = false;
        }
    }


    public function render()
    {
        return view('livewire.search.cuentas');
    }
}
