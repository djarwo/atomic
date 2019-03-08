<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class DompetStatus extends Model
{
    use Searchable;
    
    protected $fillable = ['nama'];

    protected $table = 'dompet_status';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function dompet()
    {
        return $this->hasMany('App\Dompet', 'dompet_status_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'transaksi_status_id', 'id');
    }
}
