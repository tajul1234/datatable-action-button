<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function edit($id){
       $datas= Product::where('id',$id)->first();
        return view('update',compact('$datas'));
    }



}

