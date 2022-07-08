<?php

namespace App\Exports;

use App\Donasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonasiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donasi::all();
    }
    public function headings(): array
    {
        return [
        'no','id_donatur','jenis_donasi','jumlah','pengiriman',
        'provinsi','kota','kecamatan','kelurahan',
        'latitude','longitude','status','Created At',
        'Updated At'
        ];
    }
}
