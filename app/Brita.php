<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;

class Brita extends Model
{
    use Sluggable;
    protected $table = 'table_brita';
    protected $fillable = ['judul', 'slug', 'keterangan', 'foto', 'penulis', 'views'];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'judul'
         ]
    ];
    }
}