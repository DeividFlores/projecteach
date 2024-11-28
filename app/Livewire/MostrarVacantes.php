<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vacante;

class MostrarVacantes extends Component
{
    use WithPagination;

    public function render()
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }

        $vacantes = Vacante::where('user_id', $user->id)->paginate(2);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
