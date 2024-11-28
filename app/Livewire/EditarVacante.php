<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class EditarVacante extends Component
{
    public $vacante;

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function render()
    {
        return view('livewire.editar-vacante');
    }

    public function actualizar()
    {
        $this->validate([
            'vacante.titulo' => 'required|string|max:255',
            'vacante.descripcion' => 'required|string',
        ]);

        $this->vacante->save();

        session()->flash('message', 'Competencia actualizada correctamente.');

        return redirect()->route('vacantes.index');
    }
}
