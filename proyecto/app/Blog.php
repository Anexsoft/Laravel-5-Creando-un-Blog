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
    
    public function documentos()
    {
        return $this->hasMany('App\Documento');
    }
    
    public function getTotalDocumentosAttribute($value)
    {
        return $this->documentos()
                    ->count();
    }
}
