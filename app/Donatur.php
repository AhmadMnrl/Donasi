<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $fillable = [
        'nama','email','no_telp','alamat'
    ];
    protected $primaryKey = 'id';

    public function donasi(){
        return $this->hasMany(Donasi::class, 'id', 'id_donatur');
    }
}
