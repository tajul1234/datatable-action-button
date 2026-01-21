<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Postt;

class Post extends Component
{

  public $posts,$create=false,$body,$title,$editdatau=false,$postId;


  public function resetdata(){
    $this->title='';
    $this->body='';
  }

  public function createdata(){
    $this->validate([
        'title'=>'required',
        'body'=>'required'
    ]);

    Postt::create([
        "title"=>$this->title,
        "body"=>$this->body
    ]);
    $this->create=false;
    $this->resetdata();
    session()->flash("success","Post create Sccessful");
  }

public function createpost(){
       $this->resetdata();
    $this->create=true;
    $this->editdatau=false;
}

public function cancel(){
    $this->create=false;
    $this->editdatau=false;
}

public function editdata($id){
    $post=Postt::find($id);
    $this->title=$post->title;
    $this->body=$post->body;
    $this->postId=$post->id;
    $this->editdatau=true;
    $this->create=false;
}



    public function render()
    {
        $this->posts=Postt::latest()->get();
        return view('livewire.post');
    }

    

    public function updateDataa(){
         $this->validate([
        'title'=>'required',
        'body'=>'required'
    ]);

    $post=Postt::find($this->postId);
   $post->title=$this->title;
   $post->body=$this->body;
   $post->save();
   
    $this->resetdata();
    $this->editdatau = false;

    session()->flash('success', 'Post updated successfully');
    }
    public function deleteData($id){
        Postt::find($id)->delete();
            session()->flash('success', 'Post delete successfully');

    }


}
