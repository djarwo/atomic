<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table   = 'tb_gallery';

  public function kategorigallery()
    {
      return $this->hasMany('App\KategoriGallery','kode_kategori_gallery','kode_kategori_gallery');
    }

  public function client()
    {
      return $this->hasMany('App\Client','kode_client','kode_client');
    }

  public function kontengallery()
  {
    return $this->hasMany('App\KontenGallery','kode_gallery','kode_gallery');
  }

}
