<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class KategoriStatus extends Model
{
    use Searchable;

    protected $fillable = ['nama'];

    protected $table = 'kategori_status';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function kategori()
    {
        return $this->hasMany('App\Kategori', 'kategori_status_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'kategori_status_id', 'id');
    }
}
