<?php

namespace App\Jobs\Dompet;
use App\Kategori;
use App\KategoriStatus;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class NonActiveKategori
{
    protected $kategori;

    public function __construct(Kategori $kategori)
    {
        $this->kategori = $kategori;
    }

    public function handle()
    {
        $kategoriStatus               = KategoriStatus::where('nama','Tidak Aktif')->first();        
        $kategori                     = Kategori::findOrfail($this->kategori->id);
        $kategori->kategori_status_id = $kategoriStatus->id;
        $kategori->save();

        if($kategori instanceof Kategori) {
            return $kategori;
        }

        return false;
    }
}
