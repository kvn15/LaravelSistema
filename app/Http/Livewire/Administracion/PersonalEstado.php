<?php

namespace App\Http\Livewire\Administracion;

use App\Models\Person;
use Livewire\Component;

class PersonalEstado extends Component
{

    public $personal;
    public $isActive;

    public function mount(){
        $this->isActive = $this->personal->estado == 1 ? true : false;
        $this->personal->estadoName = $this->personal->estado == 1 ? 'Active' : 'Inactivo';
    }

    public function active(){

        if($this->personal->estado == 1){
            $person = new Person();
            $person->where('id', $this->personal->id)->update([
                'estado' => '0'
            ]);
            $this->isActive = false;
            $this->personal->estadoName = 'Inactivo';
        }else{
            $person = new Person();
            $person->where('id', $this->personal->id)->update([
                'estado' => '1'
            ]);
            $this->isActive = true;
            $this->personal->estadoName = 'Active';
        }

    }

    public function render()
    {
        return view('livewire.administracion.personal-estado');
    }
}
