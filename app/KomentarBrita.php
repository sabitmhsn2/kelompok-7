<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarBrita extends Model
{
    protected $table = 'komentar_brita';
    protected $guarded = [];


    public function berita()
    {
        return $this->belongsTo('App\Brita', 'id');
    }
}
