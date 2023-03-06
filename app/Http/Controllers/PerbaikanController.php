<?php

namespace App\Http\Controllers;

use App\Models\DetailPerbaikan;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->member->mekanik != null){       
            $perbaikan = Perbaikan::with(['detail','Kerusakan','mekanik'])->where('idmekanik','=',auth()->user()->member->mekanik->id)->get();
            return view('perbaikan.index', compact('perbaikan'));
        }
        

        $perbaikan = Perbaikan::with(['detail','Kerusakan','mekanik'])->get();
        return view('perbaikan.index', compact('perbaikan'));
    }

    public function detail($id)
    {
        $detail = DetailPerbaikan::where('idperbaikan', $id)->get();
        return view('perbaikan.detail', compact('id','detail'));
    }

    public function createDetails(Request $request, $id)
    {
        $request->validate([
            'jenisPerbaikan' => 'required|string',
            'nominal' => 'required|integer',
            'keterangan' => 'required|string',
        ]);
        
        try {
            DB::beginTransaction();

            DetailPerbaikan::create([
                'jenisPerbaikan' => $request->jenisPerbaikan,
                'nominal' => intval($request->nominal),
                'keterangan' => $request->keterangan,
                'idperbaikan' => $id
            ]);

            Db::commit();

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function deleteDetails( $id)
    {        
        try {
            DB::beginTransaction();

            DetailPerbaikan::find($id)->delete();

            Db::commit();

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function invoice($id)
    {   
        $title = 'Invoice Perbaikan';
        $perbaikan = Perbaikan::where('id',$id)->with(['detail','mekanik'])->first();
        $detail = DetailPerbaikan::where('idperbaikan',$id)->get();
        $nominal = DetailPerbaikan::where('idperbaikan',$id)->select('nominal')->sum('nominal');
        
        return view('perbaikan.invoice', compact('perbaikan','title','nominal','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DetailPerbaikan::with(['perbaikan'])->where('idperbaikan', $id)->get();
        $json = [
            'data' => $data
        ];
        return $json;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    
    public function upStatus($id)
    {
        try {
            Db::beginTransaction();

            Perbaikan::where('id','=',$id)->update([
                'statusPembayaran' => 'sudah bayar'
            ]);

            DB::commit();

            return redirect()->route('perbaikan.index')->with('success','Data berhasil diedit');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    
}
