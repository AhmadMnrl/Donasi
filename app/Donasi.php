<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasis';
    protected $fillable = [
        'id_donatur','jenis_donasi','jumlah','pengiriman',
        'provinsi','kota','kecamatan','kelurahan','full_address','status',
        'name','email','no_tlp','jenis_pembayaran'
    ];
    protected $primaryKey = 'id';

    public function donatur(){
        return $this->belongsTo(Donatur::class, 'id_donatur', 'id');
    }
}
