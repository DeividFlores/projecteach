<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Costo;
use Database\Seeders\CategoriasSeeder;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\Vacante;


class CrearVacante extends Component
{
    public $titulo;
    public $costo;
    public $categoria;
    public $tema;
    public $ultimo_dia;
    public $descripcion;
    public $imagen; 
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'costo' => 'required',
        'categoria' => 'required',
        'tema' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    public function crearVacante()
    {
        $datos =$this->validate();

        //Almacenamiento de la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes','',$imagen);
        //dd($imagen);

        //Crear la vacante de la competencia
        Vacante::create([
            'titulo' => $datos['titulo'],
            'costo_id' => $datos['costo'],
            'categoria_id' => $datos['categoria'],
            'tema' => $datos['tema'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('mensaje','La competencia se ha creado correctamente');

        //Redireccionar
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        //Consultas a la base de datos papu

        $costos = Costo::all();
        $categorias = Categoria::all();




        return view('livewire.crear-vacante',[
            'costos' => $costos,
            'categorias' => $categorias
        ]);

    }
}
