<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class FunctionCategory extends Component
{
    // Variables para abrir el modal
    public $modal = false;

    // Variable para almacenar el modelo categoría
    public $category;

    protected $listeners = [
        'open',
        'delete'
    ];

    // Reglas de validación
    protected $rules = [
        'category.name' => 'required',
    ];

    // Realiza la validación en tiempo real
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function open($category_id)
    {
        // Abrir el modal
        $this->modal = true;

        // Almacena el modelo de categoría
        $this->category = Category::find($category_id);
    }

    public function update()
    {
        // Valida las $rules antes de seguir con la función
        $this->validate();

        // Actualiza la categoría usando el modelo
        $this->category->save();

        // Restablece las variables iniciales
        $this->reset([
            'modal',
        ]);

        // Actualiza la datatable categoría
        $this->emitTo('category.table-category', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Actualizado con éxito',
        ]);
    }

    public function delete($category_id)
    {
        // Elimina los productos relacionados a la categoría
        Category::find($category_id)->products()->detach();

        // Elimina la categoría
        Category::find($category_id)->delete();

        // Actualiza la datatable categoría
        $this->emitTo('category.table-category', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Ha sido eliminado con éxito',
        ]);
    }

    // Render de la vista
    public function render()
    {
        return view('livewire.category.function-category');
    }
}
