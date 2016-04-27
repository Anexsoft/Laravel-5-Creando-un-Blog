<?php

namespace App\Repository;

use App\Blog;

class BlogRepository
{
    public function listar() {
        return Blog::all();
    }
    
    public function obtener($id) {
        return Blog::find( $id );
    }
    
    public function guardar($data) {
        $blog = new Blog();
        
        // Logica para especificar si es un UPDATE
        if($data['id'] > 0)
        {
            $blog->exists = true;
            $blog->id = $data['id'];
        }
        
        $blog->titulo = $data['titulo'];
        $blog->descripcion = $data['descripcion'];
        $blog->contenido = $data['contenido'];
        $blog->habilitado = $data['habilitado'];
        $blog->categoria_id = $data['categoria_id'];
        
        $blog->save();
    }
    
    public function eliminar($id) {
        Blog::destroy($id);
    }
}
