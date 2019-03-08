<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    use Searchable;

    protected $fillable = ['nama'];

    protected $table = 'transaksi_status';
    protected $dates = [
        'created_at', 'updated_at'
    ];  

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'transaksi_status_id', 'id');
    }
}
