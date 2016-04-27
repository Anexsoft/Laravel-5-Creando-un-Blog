@extends('layouts.app')

@section('content')

<h1 class="page-header">
    Blog
</h1>

<a class="btn btn-default btn-lg btn-block" href="{{ url('blog/crud') }}">Nuevo registro</a>

<table class="table table-striped">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th style="width:100px;">Creado</th>
        <th style="width:100px;">Actualizado</th>
        <th style="width:160px;"></th>
    </tr>
</thead>
<tbody>
    
    @forelse ($model as $m)
        <tr>
            <td>
                <a href="blog/ver/{{ $m->id }}">
                    {{ $m->titulo }}
                </a>
                @if($m->categoria != null)
                <span class="help-block">
                    {{ $m->categoria->Nombre }}
                </span>
                @endif
            </td>
            <td>{{ $m->descripcion }}</td>
            <td>{{ $m->created_at }}</td>
            <td>{{ $m->updated_at }}</td>
            <td class="text-center">
                <a class="btn btn-xs btn-default" href="blog/crud/{{ $m->id }}">
                    <i class="fa fa-edit"></i> Editar
                </a>
                <a class="btn btn-xs btn-danger" href="blog/eliminar/{{ $m->id }}">
                    <i class="fa fa-trash"></i> Eliminar
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">
                -- No se han encontrado registros --
            </td>
        </tr>
    @endforelse
    
</tbody>
</table>

@endsection