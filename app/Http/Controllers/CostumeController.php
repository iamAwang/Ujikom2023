<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costume;

class CostumeController extends Controller
{
    public function index(){
        $costumes=Costume::simplepaginate(5);
        return view('costume',compact(['costumes']));
    }

    public function create(){
        return view('form_costume');
    }

    public function store(Request $request){
        Costume::create([
            'name'=>$request->name,
            'price'=>$request->price,
        ]);
        return redirect('costume')->with('success','Kostum Berhasil Ditambahkan');
    }

    public function edit($id){
        $edit=Costume::find($id);
        return view('form_costume',compact(['edit']));
    }

    public function update(Request $request,$id){
        $costume=Costume::find($id);

        $costume->name=$request->name;
        $costume->price=$request->price;
        $costume->save();
        
        return redirect('costume')->with('success','Kostum Berhasil Diedit');
    }

    public function delete($id){
        $film=Costume::find($id);

        $film->delete();

        return redirect('costume')->with('success','Kostum Berhasil Dihapus');
    }
}
