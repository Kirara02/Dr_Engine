<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Exports\PerbaikanExport;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $perbaikan = Perbaikan::with(['detail','kerusakan','mekanik'])->where('tanggal', $date)->where('statusPembayaran','sudah bayar')->latest()->get();
        
        $title = 'Rekap Perbaikan - ' .  Carbon::now('Asia/Jakarta')->format('d/m/Y');

        
        if ($request->tanggal) {
            $mulai = Carbon::parse(explode('-', $request->tanggal)[0])->format('Y-m-d');
            $sampai = Carbon::parse(explode('-', $request->tanggal)[1])->format('Y-m-d');

            $perbaikan = Perbaikan::with(['detail','kerusakan','mekanik'])->whereBetween('tanggal', [$mulai, $sampai])->where('statusPembayaran','sudah bayar')->latest()->get();

            $title = 'Data Perbaikan - ' . $request->tanggal;
        }

        return view('laporan.index', compact('title','perbaikan'));
    }

    public function export(Request $request)
    {
        if ($request->tanggal) {
            $mulai = Carbon::parse(explode('-', $request->tanggal)[0])->format('Y-m-d');
            $sampai = Carbon::parse(explode('-', $request->tanggal)[1])->format('Y-m-d');

            $perbaikan = Perbaikan::with(['detail','kerusakan','mekanik'])->whereBetween('tanggal', [$mulai, $sampai])->where('statusPembayaran','sudah bayar')->latest()->get();

            $title = 'Data Perbaikan - ' . $mulai . '-' . $sampai;
        }
        // dd($perbaikan);
        return Excel::download(new PerbaikanExport($perbaikan, $title), $title . '.xlsx');
    }
}
