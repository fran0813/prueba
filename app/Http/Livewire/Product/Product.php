<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Product extends Component
{
    // Variables publicas
    public $name, $quantity, $category_id;

    // Variable para almacenar las categorías
    public $select_category;

    // Reglas de validación
    protected $rules = [
        'name' => 'required|min:3|max:50',
        'quantity' => 'required|numeric',
        'category_id' => 'required',
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

    // Función para guardar el producto
    public function save()
    {
        // Valida las $rules antes de seguir con la función
        $this->validate();

        // Creación de el producto usando el modelo
        ModelsProduct::create([
            'name' => $this->name,
            'quantity' => $this->quantity,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        // Restablece las variables iniciales
        $this->reset([
            'name',
            'quantity',
            'category_id',
        ]);

        // Actualiza la datatable producto
        $this->emitTo('product.table-product', 'refreshLivewireDatatable');

        // Muestra una alerta con sweetalert2 de éxito
        $this->emit('alert_success', [
            'message' => 'Guardado con éxito',
        ]);
    }

    // Render de la vista
    public function render()
    {
        return view('livewire.product.product');
    }
}
