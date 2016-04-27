<?php
    $habilitado = true;

    if(is_object($model)){
        $habilitado = ($model->habilitado == 1);
    }
?>

@extends('layouts.app')

@section('content')

    <h1 class="page-header">
    {{ is_object($model) ? $model->titulo : 'Nuevo registro' }}
</h1>

    <!--
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->


<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#information" aria-controls="home" role="tab" data-toggle="tab">Información</a></li>
        
        @if(is_object($model))
        <li role="presentation"><a href="#documents" aria-controls="profile" role="tab" data-toggle="tab">Documentos</a></li>
        @endif
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="information">
            <form method="post" action="{{ url('blog/crud') }}">

                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ is_object($model) ? $model->id : 0 }}" />

                <div class="form-group {{ $errors->has('categoria_id') ? ' has-error' : '' }}">
                    <label>Categoría</label>
                    <select class="form-control" name="categoria_id">
                        @foreach($categorias as $c) @if(is_object($model))
                        <option {{ $model->categoria_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->Nombre }}</option>
                        @else
                        <option value="{{ $c->id }}">{{ $c->Nombre }}</option>
                        @endif @endforeach
                    </select>
                    @if ($errors->has('categoria_id'))
                    <span class="help-block">
            <strong>{{ $errors->first('categoria_id') }}</strong>
        </span> @endif
                </div>

                <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                    <label>Titulo</label>
                    <input class="form-control" type="text" name="titulo" value="{{ is_object($model) ? $model->titulo : '' }}" /> @if ($errors->has('titulo'))
                    <span class="help-block">
            <strong>{{ $errors->first('titulo') }}</strong>
        </span> @endif
                </div>

                <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
                    <label>Descripcion</label>
                    <textarea class="form-control" name="descripcion">{{ is_object($model) ? $model->descripcion : '' }}</textarea>
                    @if ($errors->has('descripcion'))
                    <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span> @endif
                </div>

                <div class="form-group {{ $errors->has('contenido') ? ' has-error' : '' }}">
                    <label>Contenido</label>
                    <textarea class="form-control" name="contenido">{{ is_object($model) ? $model->contenido : '' }}</textarea>
                    @if ($errors->has('contenido'))
                    <span class="help-block">
            <strong>{{ $errors->first('contenido') }}</strong>
        </span> @endif
                </div>

                <div class="form-group {{ $errors->has('habilitado') ? ' has-error' : '' }}">
                    <label>Habilitado</label>
                    <select class="form-control" name="habilitado">
                        <option {{ $habilitado ? 'selected' : '' }} value="1">Si</option>
                        <option {{ !$habilitado ? 'selected' : '' }} value="0">No</option>
                    </select>
                    @if ($errors->has('contenido'))
                    <span class="help-block">
            <strong>{{ $errors->first('habilitado') }}</strong>
        </span> @endif
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Guardar
                </button>

            </form>
        </div>
        
        @if(is_object($model))
        <div role="tabpanel" class="tab-pane" id="documents">
            <form id="documento-adjuntar" method="post" action="{{ url('blog/adjuntar') }}">
                
                {{ csrf_field() }}
                
                <input type="hidden" name="blog_id" value="{{ $model->id }}" />

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del documento" />
                </div>

                <div class="form-group">
                    <label>Archivo</label>
                    <input type="file" name="archivo" class="form-control" />
                </div>
                <button class="btn btn-primary btn-block" type="submit">
                    Adjuntar
                </button>
                
            </form>
            
            <hr />
            
            <ul id="adjuntos" class="list-group"></ul>
        </div>
        @endif
    </div>

</div>

<script id="documentos" type="text/x-handlebars-template">
 @{{#data}}
      <li class="list-group-item">
        <a href="{{url('uploads')}}/@{{archivo}}" target="_blank">
            @{{ nombre }}
        </a>
      </li>
  @{{/data}}
</script>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        documentos();
        
        $("#documento-adjuntar").submit(function(){
            var form = $(this);
            form.ajaxSubmit({
                success:function(){
                    form.find('input').val('');
                    documentos();
                }
            });

            return false;
        })
    })
    
    function documentos(){
        $.post('{{url('blog/documentos/' . $model->id)}}', {
            _token: '{{ csrf_token() }}'
        },function(r){
            var source   = $("#documentos").html();
            var template = Handlebars.compile(source);

            $("#adjuntos").html(
                template({data: r})
            );
        }, 'json')
    }
</script>
@endsection