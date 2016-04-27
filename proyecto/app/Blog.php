<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
