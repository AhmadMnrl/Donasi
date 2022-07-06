<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'title','content','created_by','updated_by'
    ];
    protected $primaryKey = 'id';
}
