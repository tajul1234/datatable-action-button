<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    $this->setSearchEnabled();

    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Short title", "short_title")
                ->sortable()
                 ->searchable(),
            Column::make("Price", "price")
                ->sortable()
                 ->searchable(),
            Column::make("Sku", "sku")
                ->sortable()
                 ->searchable(),
            Column::make("Stock", "stock")
                ->sortable()
                 ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
