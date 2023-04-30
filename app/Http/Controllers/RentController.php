<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Costume;

use Illuminate\Support\Facades\Auth;

use App\Exports\RentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use PDF;

class RentController extends Controller
{
    public function index(){
        $rents=Rent::all()->where('user_id',Auth::user()->id);
        return view('rent',compact(['rents']));
    }

    public function create(){
        $costumes=Costume::all();
        return view('form_rent',compact(['costumes']));
    }

    public function store(Request $request){
        Rent::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'day'=>$request->day,
            'costume_id'=>$request->costume,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect('rent')->with('success','Sewa Berhasil Ditambahkan');
    }

    public function edit($id){
        $edit=Rent::find($id);
        $costumes=Costume::all();
        return view('form_rent',compact(['edit','costumes']));
    }

    public function update(Request $request,$id){
        $rent=Rent::find($id);

        $rent->name=$request->name;
        $rent->date=$request->date;
        $rent->day=$request->day;
        $rent->costume_id=$request->costume;
        $rent->save();

        return redirect('rent')->with('success','Sewa Berhasil Diedit');
    }

    public function delete($id){
        $rent=Rent::find($id);

        $rent->delete();

        return redirect('rent')->with('success','Sewa Berhasil Dihapus');
    }

    public function export_excel(){
        return Excel::download(new RentExport, 'rent.xlsx');
    }

    public function export_pdf (){
        $rents = Rent::all()->where('user_id',Auth::user()->id);

    	$pdf = PDF::loadview('exports.rent',['rents'=>$rents]);
    	return $pdf->download('recap-rent-pdf.pdf');
    }
}
