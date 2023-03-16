<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function index()
    {
        $title = 'Daftar Perbaikan';
        $perbaikan = Perbaikan::where('statusPerbaikan','pencarian')->get();

        return view('list.index', compact('perbaikan','title'));
    }

    public function acc($id)
    {
        try {
            DB::beginTransaction();

            Perbaikan::find($id)->update([
                'idmekanik' => auth()->user()->member->mekanik()->where('statusHapus','0')->first()->id,
                'statusPerbaikan' => 'proses'
            ]);

            DB::commit();
            return redirect()->route('list.index')->with('status','Data berhasil di ACC');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
