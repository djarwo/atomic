<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use Searchable;

    protected $fillable = ['nama','kode','deskripsi','tanggal','nilai','dompet_status_id','kategori_status_id','transaksi_status_id'];

    protected $table = 'transaksi';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function dompetStatus()
    {
        return $this->belongsTo('App\DompetStatus', 'dompet_status_id', 'id');
    }

    public function kategoriStatus()
    {
        return $this->belongsTo('App\KategoriStatus', 'kategori_status_id', 'id');
    }
    
    public function transaksiStatus()
    {
        return $this->belongsTo('App\TransaksiStatus', 'transaksi_status_id', 'id');
    }
}
