<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class EditForm extends Component
{
    public function render()
    {
        return view('livewire.edit-form');
    }

    public $name,$price,$short_title,$stock,$currentid;

    public function mount($id){
        $product=Product::findorFail($id);
        $this->currentid=$product->id;
        $this->name=$product->name;
        $this->short_title=$product->short_title;
        $this->price=$product->price;
        $this->stock=$product->stock;

    }

    public function Updatedata(){
      $data= Product::find($this->currentid);

      $this->validate([
        'name'=>'required',
        'price'=>'required',
        'short_title'=>'required',
        'stock'=>'required',
      ]);

      $data->update([
        'name'=>$this->name,
        'short_title'=>$this->short_title,
        'price'=>$this->price,
        'stock'=>$this->stock,

      ]);

      $this->js("Livewire.navigate('/home')");

      session()->flash('success','Data update successfully');
    }
}
