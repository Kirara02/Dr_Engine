<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use Illuminate\Http\Request;
use App\Models\JenisKerusakan;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('repair.index');
    }
    
    public function kerusakan()
    {
        $status = ['active','disable','disable'];
        return view('repair.form', compact('status'));
    }

    public function diagnosa()
    {  
        $jenis = JenisKerusakan::get();
        $status = ['completed','active','disable'];
        return view('repair.form', compact('status','jenis'));      
    }

    public function mekanik(Request $request)
    {
        $status = ['completed','completed','active'];
        $mekanik = Mekanik::with(['member'])->get();
        
        $cari = $request->input('cari');

        if($cari){
            $mekanik = Mekanik::with(['member'])
                ->where('name','LIKE', '%'.$cari.'%')
                ->orWhere('alamat','LIKE', '%'.$cari.'%')
                ->get();
        }
        
        return view('repair.form', compact('status','mekanik'));    
    }

    public function storeKerusakan(Request $request)
    {
        $request->validate([
            
        ]);

        $status = ['completed','active','disable'];
        return redirect()->route('repair.diagnosa')->with('status');
    }

    public function storeDiagnosa(Request $request)
    {
        $request->validate([
        
        ]);

        $status = ['completed','completed','active'];
        return redirect()->route('repair.mekanik')->with('status');
    }

    public function storeMekanik(Request $request)
    {
        $request->validate([
        
        ]);

        return redirect()->route('repair.index')->with('status');
    }



}
