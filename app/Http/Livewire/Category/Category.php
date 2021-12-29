<?php

namespace App\Http\Livewire\Category;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    // Variables publicas
    public $name;

    // Reglas de validación
    protected $rules = [
        'name' => 'required',
    ];

    // Realiza la validación en tiempo real
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Función para guardar la categoría
    public function save()
    {
        // Valida las $rules antes de seguir con la función
        $this->validate();

        // Creación de la categoría usando el modelo
        ModelsCategory::create([
            'name' => $this->name,
        ]);

        // Restablece las variables iniciales
        $this->reset([
            'name',
        ]);

        // Actualiza la datatable categoría
        $this->emitTo('category.table-category', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Guardado con éxito',
        ]);
    }

    // Render de la vista
    public function render()
    {
        return view('livewire.category.category');
    }
}
