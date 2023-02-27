<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mekanik;
use App\Models\Kerusakan;
use App\Models\Perbaikan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisKerusakan;
use App\Models\DiagnosaKerusakan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\repair\CreateKerusakanRequest;

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
        $data = Perbaikan::select('idKerusakan')->latest()->first();
        $diagnosa = DiagnosaKerusakan::with(['jenisKerusakan'])->where('idkerusakan','=',$data->idKerusakan)->get();

        $jenis = JenisKerusakan::get();
        $status = ['completed','active','disable'];
        return view('repair.form', compact('status','jenis','diagnosa'));      
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

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            DiagnosaKerusakan::find($id)->delete();            

            DB::commit();

            return back()->with('success', 'Member berhasil didelete');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function storeKerusakan(Request $request)
    {
        $request->validate([
            'jenisKendaraan' => 'required|string',
            'tipeKendaraan' => 'required|string',
            'tahunKendaraan' => 'required|string',
            'fotoKendaraan' => 'required|mimes:jpg,jpeg,png',
        ]);
        
        try {

            Db::beginTransaction();

            $foto = $request->file('fotoKendaraan');
            $fotoUrl = $foto->storeAs('kerusakan', Str::slug($request->tipeKendaraan) . '-' . Str::random(6). '.' . $foto->extension());

            Kerusakan::create([
                'jenisKendaraan' => $request->jenisKendaraan,
                'tipeKendaraan' => $request->tipeKendaraan,
                'tahunKendaraan' => $request->tahunKendaraan,
                'fotoKendaraan' => $fotoUrl,
                'idmember' => auth()->user()->member->id
            ]);

            $data = Kerusakan::select('id')->latest()->first();

            Perbaikan::create([
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'statusPerbaikan' => 'pencarian',
                'statusPembayaran' => 'belum bayar',
                'idmekanik' => null,
                'idKerusakan' => $data->id
            ]);
            
            Db::commit();
    
            $status = ['completed','active','disable'];
            return redirect()->route('repair.diagnosa')->with('status');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function storeDiagnosa(Request $request)
    {
        $request->validate([
            'jenisKerusakan' => 'nullable',
            'keterangan' => 'required|string'
        ]);

        try {

            Db::beginTransaction();

            $data = Kerusakan::select('id')->latest()->first();

            DiagnosaKerusakan::create([
                'idJenisKerusakan' => $request->jenisKerusakan,
                'idKerusakan' => $data->id,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();


            $status = ['completed','completed','active'];
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function storeMekanik(Request $request)
    {
        $request->validate([
        
        ]);

        try {
            

            return redirect()->route('repair.index')->with('status');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }



}
