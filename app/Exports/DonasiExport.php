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
    public function __construct(array $filter){
        if(isset($filter['status']) && $filter['status'] != null){
            $this->status = $filter['status'];
        }else{
            $this->status = null;
        }
        if(isset($filter['startDate']) && $filter['startDate'] != null){
            $this->startDate = $filter['startDate'];
        }else{
            $this->startDate = Null;
        }
        if(isset($filter['endDate']) && $filter['endDate'] != null){
            $this->endDate = $filter['endDate'];
        }else{
            $this->endDate = Null;
        }
    }

    public function collection()
    {
        dd($this->status);
        return Donasi::all();

    }
    public function view(): View
    {
        // dd($this->status);

        $data = Donasi::select('*');

        if($this->status != null && $this->status != ""){
            $status = $this->status;
            $data = $data->where('status',$status);
        }

        if ($this->startDate != "" && $this->startDate != null ||
            $this->endDate != "" && $this->endDate != null) {
                $startDate = $this->startDate ?? date("Y/m/d");
                $endDate = $this->endDate ?? date("Y/m/d");
                $data = $data->whereBetween('created_at',[$startDate,$endDate]);
        }

        $donasi = $data->get();
        // dd($donasi);
        return view('report.excel',compact('donasi'));
    }
}
