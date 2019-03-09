<?php

namespace App\Jobs\Kategori;
use App\Kategori;
use App\KategoriStatus;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class ActiveKategori
{
    protected $kategori;

    public function __construct(Kategori $kategori)
    {
        $this->kategori = $kategori;
    }

    public function handle()
    {
        $kategoriStatus               = KategoriStatus::where('nama','Aktif')->first();
        $kategori                     = Kategori::findOrfail($this->kategori->id);
        $kategori->kategori_status_id = $kategoriStatus->id;
        $kategori->save();

        if($kategori instanceof Kategori) {
            return $kategori;
        }

        return false;
    }
}
