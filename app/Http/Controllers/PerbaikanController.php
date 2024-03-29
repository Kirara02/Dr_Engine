<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Models\DetailPerbaikan;
use Illuminate\Support\Facades\DB;

class PerbaikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('isMekanik', ['only' => [
            'show','detail','createDetails','deleteDetails'
        ]]);

        $this->middleware('isAdmin', ['only' => [
            'index'
        ]]);
    }

    public function index()
    {
        $perbaikan = Perbaikan::with(['detail','Kerusakan','mekanik'])->get();
        return view('perbaikan.index', compact('perbaikan'));
    }

    public function show()
    {
        $perbaikan = Perbaikan::with(['detail','Kerusakan','mekanik'])->where('idmekanik','=',auth()->user()->member->mekanik()->where('statusHapus','0')->first()->id)->get();
        return view('perbaikan.index', compact('perbaikan'));
    }
    public function detail($id)
    {
        $perbaikan = Perbaikan::with(['detail','kerusakan'])->where('id',$id)->first();
        return view('perbaikan.detail', compact('id','perbaikan'));
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

        return view('perbaikan.invoice', compact('perbaikan','title'));
    }

    public function upStatusPembayaran($id)
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

            return redirect()->route('perbaikan.index')->with('success','Data berhasil diedit');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
