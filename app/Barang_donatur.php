<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_donatur extends Model
{
    protected $table = 'barang_donatur';
    protected $fillable = [
        'nama','keterangan'
    ];
    protected $primaryKey = 'id';
}
