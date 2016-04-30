@extends('layouts.app')

@section('content')

<h1 class="page-header">
    {{ $model->titulo }} 
    @if($model->categoria != null)
    <small>
        - {{ $model->categoria->Nombre }}
    </small>
    @endif
</h1>

<h3>Descripcion</h3>
<p>{{ $model->descripcion }}</p>

<h3>Contenido</h3>
<p>{{ $model->contenido }}</p>

<h3>Habilitado</h3>
<p>{{ $model->habilitado == 1 ? 'Si' : 'No' }}</p>

<h3>Documentos</h3>
<ul class="list-group">
@forelse ($model->documentos as $d)
    <li class="list-group-item">
        <a target="_blank" href="{{ url('upload/' . $d->archivo ) }}">
            {{ $d->nombre }}
        </a>
    </li>
@empty
    <li class="list-group-item">
        No hay documentos adjuntos
    </li>
@endforelse
</ul>

<div class="well well-sm">
    <b>Creado:</b> {{ $model->created_at }}
    <b>Actualizado:</b> {{ $model->updated_at }}
</div>

@endsection