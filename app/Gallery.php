<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = [
        'image','original_fullname','keterangan','id_yayasan'
    ];
    protected $primaryKey = 'id';
    public function Yayasan()
    {
        return $this->hasOne(yayasan::class);
    }

}
