<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Counter extends Component
{
    use WithFileUploads,WithPagination;

     #[Url]
    public $search;


    public function render()
    {

     return view('livewire.counter',['informations'=>Invoice::where('name','LIKE','%' . $this->search .'%')
                 ->orWhere('amount','LIKE','%'. $this->search .'%')
                 ->paginate(4)]);
    }




    public $name, $amount, $pdf_file;

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'amount' => 'required|numeric|min:1',
            'pdf_file' => 'required|file|mimes:pdf|max:2048'

        ]);


        $pdf_path = $this->pdf_file->store('invoice', 'public');

        Invoice::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'pdf_file' => $pdf_path
        ]);

        $this->reset('name', 'amount', 'pdf_file');
        session()->flash('success', 'Pdf upload successful');
    }







    public function download($id)
    {
        $data = Invoice::findOrFail($id);

        return response()->download(
            storage_path('app/public/' . $data->pdf_file),
            $data->name . '.pdf'
        );
    }

   public function resetFields()
{
    $this->name = "";
    $this->amount = "";
    $this->pdf_file = "";
}


public $result=false;

public function  resutshow(){

    $this->result=!$this->result;
}

}
