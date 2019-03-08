<?php

namespace App;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use Searchable;

    protected $fillable = ['nama','referensi','deskripsi','dompet_status_id'];

    protected $table = 'dompet';
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function dompetStatus()
    {
        return $this->belongsTo('App\DompetStatus', 'dompet_status_id', 'id');
    }
}
