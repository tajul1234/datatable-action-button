<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Productt extends Component
{

public $products;
    public function render()
    {

    $this->products=Product::latest()->get();

        return view('livewire.productt');
    }
}
