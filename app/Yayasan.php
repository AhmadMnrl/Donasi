<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Yayasan extends Model
{
    protected $table = 'yayasan';
    protected $fillable = [
        'nama_lengkap','no_tlp','email','address','keterangan','foto'
    ];
    protected $primaryKey = 'id';
    public function Gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
