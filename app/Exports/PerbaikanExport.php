<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerbaikanExport implements FromView
{
    public function __construct($perbaikan = [], $title = '')
    {
        $this->perbaikan = $perbaikan;
        $this->title = $title;
    }

    public function view(): View
    {
        return view('laporan.export', [
            'title' => $this->title,    
            'perbaikan' => $this->perbaikan,    
        ]);
    }
}
