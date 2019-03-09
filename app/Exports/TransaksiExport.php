<?php

namespace App\Exports;

use App\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{
    protected $transaksi;
    public function __construct($transaksi) {
    	$this->transaksi = $transaksi;
    }

    public function view(): View
    {            
        return view('transaksi.export',[
    		'transaksi'=>$this->transaksi,
    	]);
    }
}
