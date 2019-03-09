<?php

namespace App\Jobs\Dompet;
use App\Dompet;
use App\DompetStatus;
use Illuminate\Http\Request;

/**
 * Crate city job.
 *
 * @author      mohammad.anang  <m.anangnur@gmail.com>
 * @package     wahyoo-web-api
 */

class ActiveDompet
{
    protected $dompet;

    public function __construct(Dompet $dompet)
    {
        $this->dompet = $dompet;
    }

    public function handle()
    {
        $dompetStatus               = DompetStatus::where('nama','Aktif')->first();
        $dompet                     = Dompet::findOrfail($this->dompet->id);
        $dompet->dompet_status_id   = $dompetStatus->id;
        $dompet->save();

        if($dompet instanceof Dompet) {
            return $dompet;
        }

        return false;
    }
}
