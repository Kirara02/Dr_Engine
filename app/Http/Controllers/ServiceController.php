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
use App\Models\DetailPerbaikan;

class ServiceController extends Controller
{

    public function index()
    {
        $data['kerusakan'] = Kerusakan::with(['perbaikan','member'])->where('idmember', '=',auth()->user()->member->id)->get();
        return view('service.index')->with($data);
    }
    
    public function kerusakan()
    {
        $status = ['active','disable','disable'];
        return view('service.form', compact('status'));
    }

    public function diagnosa()
    {  
        $data = Kerusakan::select('id')->where('idmember','=',auth()->user()->member->id)->latest()->first();
        $diagnosa = DiagnosaKerusakan::with(['jenisKerusakan'])->where('idkerusakan','=',$data->id)->get();

        $jenis = JenisKerusakan::get();
        $status = ['completed','active','disable'];
        return view('service.form', compact('status','jenis','diagnosa'));      
    }

    public function mekanik(Request $request)
    {   
       
        $status = ['completed','completed','active'];
        $mekanik = Mekanik::with(['member'])->where('statusSibuk','0')->get();

        $cari = $request->input('cari');

        if($cari){
            $mekanik = Mekanik::with(['member'])
                ->where(function($q) use ($cari){
                    $q->where('name','LIKE', '%'.$cari.'%')
                    ->orWhere('alamat','LIKE', '%'.$cari.'%');
                })->where('statusSibuk','0')
                ->get();
        }
        
        return view('service.form', compact('status','mekanik'));    
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

            $data = Kerusakan::select('id')->where('idmember','=',auth()->user()->member->id)->latest()->first();

            Perbaikan::create([
                'tanggal' => Carbon::now()->format('Y-m-d h:i:s'),
                'statusPerbaikan' => 'pencarian',
                'statusPembayaran' => 'belum bayar',
                'idmekanik' => null,
                'idKerusakan' => $data->id
            ]);
            
            Db::commit();
    
            $status = ['completed','active','disable'];
            return redirect()->route('service.diagnosa')->with('status');
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

            $data = Kerusakan::select('id')->where('idmember','=',auth()->user()->member->id)->latest()->first();

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
            'idmekanik' => 'required'
        ]);

        try {
         
            Db::beginTransaction();

            $data = Kerusakan::select('id')->where('idmember','=',auth()->user()->member->id)->latest()->first();

            Perbaikan::where('idkerusakan','=',$data->id)->update([
                'idmekanik' => $request->idmekanik,
                'statusPerbaikan' => 'proses',
            ]);

            Mekanik::find($request->idmekanik)->update([
                'statusSibuk' => '1'
            ]);

            DB::commit();      

            return redirect()->route('service.index')->with('status');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function upStatusPerbaikan($id)
    {
        try {

            Db::beginTransaction();

            Perbaikan::where('idkerusakan',$id)->update([
                'statusPerbaikan' => 'selesai'
            ]);

            $data = Perbaikan::where('id','=',$id)->first();
            
            Mekanik::where('id',$data->idmekanik)->update([
                'statusSibuk' => '0'
            ]);

            DB::commit();

            return redirect()->route('service.index')->with('success','Data berhasil ditambahkan');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function detail($id)
    {
        $title = 'Detail Service';
        $perbaikan = Perbaikan::where('id',$id)->with(['detail','mekanik'])->first();
        
        return view('service.detail', compact('perbaikan','title'));
    }
}
