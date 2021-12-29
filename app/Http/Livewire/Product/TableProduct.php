<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TableProduct extends LivewireDatatable
{
    public $exportable = true;
    public $sort = 'id|asc';

    public function builder()
    {
        return Product::leftJoin('categories', 'categories.id', 'products.category_id')
            ->leftJoin('users', 'users.id', 'products.user_id');
    }

    public function columns()
    {
        return [
            Column::checkbox(),

            NumberColumn::name('id')
                ->label('id')
                ->alignCenter()
                ->searchable(),

            Column::name('name')
                ->label('nombre')
                ->alignCenter()
                ->searchable(),

            NumberColumn::name('quantity')
                ->label('cantidad')
                ->alignCenter()
                ->searchable(),

            Column::name('categories.name')
                ->label('categoría')
                ->alignCenter()
                ->searchable(),

            Column::callback(['id'], function ($id) {
                return view('product.table-action', [
                    'id' => $id,
                ]);
            })->unsortable()
                ->excludeFromExport(),
        ];
    }
}
