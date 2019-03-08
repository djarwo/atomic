<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use Searchable;

    protected $fillable = ['nama','deskripsi','kategori_status_id'];

    protected $table = 'kategori';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function kategoriStatus()
    {
        return $this->belongsTo('App\KategoriStatus', 'kategori_status_id', 'id');
    }
}
