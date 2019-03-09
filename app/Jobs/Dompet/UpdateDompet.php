<?php

namespace App\Jobs\Dompet;
use App\Dompet;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class UpdateDompet
{
    protected $request;

    public function __construct(Request $request,$dompet)
    {
        $this->request  = $request;
        $this->dompet   = $dompet;
    }

    public function handle()
    {
        $dompet                     = Dompet::findOrfail($this->dompet->id);
        $dompet->nama               = $this->request->nama;
        $dompet->referensi          = $this->request->referensi;
        $dompet->deskripsi          = $this->request->deskripsi;
        $dompet->dompet_status_id   = $this->request->status;
        $dompet->save();

        if($dompet instanceof Dompet) {
            return $dompet;
        }

        return false;
    }
}
