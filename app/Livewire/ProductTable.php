<?php

namespace App\Livewire;

use App\Models\Product;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;

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
         WireLinkColumn::make("Delete Item")
    ->title(fn($row) => 'Delete')
    ->confirmMessage('Are you sure you want to delete this item?')
    ->action(fn($row) => 'delete("'.$row->id.'")')
    ->attributes(fn($row) => [
        'class' => 'text-red-500',
    ]),



    LinkColumn::make('Action')
    ->title(fn($row) => 'Edit')
    ->location(fn($row) => route('edit.product', $row))
    ->attributes(fn($row) => [
        'class' => 'rounded-full',
        'alt' => $row->name . ' Avatar',
    ]),

        ];
    }


    public function delete($id){
        Product::find($id)->delete();
    }
}
