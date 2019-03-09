<?php

namespace App\Jobs\Transaksi;

use App\Dompet;
use App\Kategori;
use App\Transaksi;
use App\TransaksiStatus;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class CreateTransaksiOut
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $transaksiStatus                = TransaksiStatus::where('nama','Keluar')->first();
        $transaksi                      = new Transaksi;
        $transaksi->code                = $this->request->kode;        
        $transaksi->deskripsi           = $this->request->deskripsi == '' ? '-' : $this->request->deskripsi;
        $transaksi->date                = date('Y-m-d');
        $transaksi->nilai               = $this->request->nilai;
        $transaksi->dompet_id           = $this->request->dompet_id;
        $transaksi->kategori_id         = $this->request->kategori_id;
        $transaksi->transaksi_status_id = $transaksiStatus->id;        
        $transaksi->save();

        if($transaksi instanceof Transaksi) {
            return $transaksi;
        }

        return false;
    }
}
