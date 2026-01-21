<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Livewire\Attributes\On;

class Counter extends Component
{
  public $type;
    public $name;
    public $amount;
    public $address,$date;
    public $status = 'pending';

    public function save()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'amount' => 'required|numeric',
        //     'address' => 'required',
        //     'date'=>'required|date',
        // ]);

        // Invoice::create([
        //     'name' => $this->name,
        //     'amount' => $this->amount,
        //     'address' => $this->address,
        //     'date'=>$this->date
        // ]);


        session()->flash('success', 'Invoice Added Successfully!');

        $this->reset();


    $this->items=Invoice::all();


    }

    public $items=[];

    public function mount(){

  $this->items=Invoice::all();
    }


    public function render()
    {
        return view('livewire.counter');
    }
  public function deleteuser($id){
       $this->dispatch('deletedata',id:$id);
  }

   #[On('delete')]
  public function delete($id){
    Invoice::find($id)->delete();
    $this->items=Invoice::all();
  }

}
