<?php

namespace App\Repository;

use App\Categoria;

class CategoriaRepository
{
    public function listar() {
        return Categoria::all();
    }
}
