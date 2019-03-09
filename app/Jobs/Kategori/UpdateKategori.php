<?php

namespace App\Jobs\Kategori;
use App\Kategori;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class UpdateKategori
{
    protected $request;

    public function __construct(Request $request,$kategori)
    {
        $this->request  = $request;
        $this->kategori = $kategori;
    }

    public function handle()
    {
        $kategori                     = Kategori::findOrfail($this->kategori->id);        
        $kategori->nama               = $this->request->nama;        
        $kategori->deskripsi          = $this->request->deskripsi;
        $kategori->kategori_status_id = $this->request->status;
        $kategori->save();

        if($kategori instanceof Kategori) {
            return $kategori;
        }

        return false;
    }
}
