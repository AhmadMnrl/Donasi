<?php

namespace App\Observers;
use App\Berita;
use App\Observers\Auth;

class BeritaObserver
{
    public function created(Berita $berita)
    {
        // $berita->created_by = Auth::user()->id();
        // $berita->updated_by = Auth:user()->:id();
    }
 
    /**
     * Handle the Berita "updated" event.
     *
     * @param  \App\Berita  $berita
     * @return void
     */
    public function updated(Berita $berita)
    {
        $berita->updated_by = Auth::id();
    }
}
