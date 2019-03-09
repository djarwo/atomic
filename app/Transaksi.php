<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use Searchable;

    protected $fillable = ['nama','kode','deskripsi','tanggal','nilai','dompet_id','kategori_id','transaksi_id'];

    protected $table = 'transaksi';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function dompet()
    {
        return $this->belongsTo('App\Dompet', 'dompet_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
    }
    
    public function transaksiStatus()
    {
        return $this->belongsTo('App\TransaksiStatus', 'transaksi_status_id', 'id');
    }
}
