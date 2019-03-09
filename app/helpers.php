
<?php
use App\Transaksi;
use Illuminate\Bus\Dispatcher;
if(!function_exists('kode')) {
    /**
     * laravel command helper.
     *
     * @param null $object
     * @return \Illuminate\Foundation\Application|mixed
     */
    function kode() {
        $transaksi  = Transaksi::orderBy('id', 'DESC')->first();
        $number     = 000000;
        $kode       = 'WIN'.$number+$transaksi->id;
        dd($kode);
    }
}