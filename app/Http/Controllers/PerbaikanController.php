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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $title = 'Detail Perbaikan';
        $perbaikan = Perbaikan::find($id)->with(['detail','Kerusakan','mekanik'])->get();
        return view('perbaikan.detail', compact('perbaikan','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
           'nominal' => 'required|integer',
           'keterangan' => 'required|string',
        ]);
        try {
            DB::beginTransaction();

            DetailPerbaikan::where('idperbaikan',$id)->update([
                'nominal' => intval($request->nominal),
                'keterangan' => $request->keterangan,
            ]);

            Perbaikan::find($id)->update([
                'statusPembayaran' => 'sudah bayar'
            ]);

            Db::commit();

            return redirect()->route('perbaikan.index')->with('success','Data berhasil diedit');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
