<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class FunctionProduct extends Component
{
    // Variables para abrir el modal
    public $modal = false;

    // Variable para almacenar el modelo producto
    public $product;

    protected $listeners = [
        'open',
        'delete'
    ];

    // Reglas de validación
    protected $rules = [
        'product.name' => 'required|min:3|max:50',
        'product.quantity' => 'required|numeric',
        'product.category_id' => 'required',
    ];

    // Realiza la validación en tiempo real
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Función de carga inicial
    public function mount()
    {
        $this->select_category = Category::orderBy('name', 'asc')->get();
    }

    public function open($product_id)
    {
        // Abrir el modal
        $this->modal = true;

        // Almacena el modelo de producto
        $this->product = Product::find($product_id);
    }

    public function update()
    {
        // Valida las $rules antes de seguir con la función
        $this->validate();

        // Actualiza el producto usando el modelo
        $this->product->save();

        // Restablece las variables iniciales
        $this->reset([
            'modal',
        ]);

        // Actualiza la datatable producto
        $this->emitTo('product.table-product', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Actualizado con éxito',
        ]);
    }

    public function delete($product_id)
    {
        // Elimina el producto
        Product::find($product_id)->delete();

        // Actualiza la datatable producto
        $this->emitTo('product.table-product', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Ha sido eliminado con éxito',
        ]);
    }

    // Render de la vista
    public function render()
    {
        return view('livewire.product.function-product');
    }
}
