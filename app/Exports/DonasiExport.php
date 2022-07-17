<?php

namespace App\Exports;

use App\Donasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DonasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donasi::all();
    }
    public function view(): View
    {
        $donasi = Donasi::all();
        return view('report.excel',compact('donasi'));
    }
}
