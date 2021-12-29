<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TableCategory extends LivewireDatatable
{
    public $exportable = true;
    public $sort = 'id|asc';

    public function builder()
    {
        return Category::query();
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

            Column::callback(['id'], function ($id) {
                return view('category.table-action', [
                    'id' => $id,
                ]);
            })->unsortable()
                ->excludeFromExport(),
        ];
    }
}
