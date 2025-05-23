@extends('adminlte::page')

@section('content_header')
    <h1><b>Gestiones / Editar Gestion</b></h1>
    <hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Llena los datos del formulario</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/gestiones/' . $gestion->id) }}" method="post">
                    @csrf
                    @method('PUT') 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Gestion:</label><b> (*)</b>
                                <div class="input-group md-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" 
                                           value="{{ old('nombre', $gestion->nombre) }}" 
                                           placeholder="Escriba aquí..." required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/gestiones') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- Cierra card-body -->
        </div> <!-- Cierra card -->
    </div> <!-- Cierra col-md-6 -->
</div> <!-- Cierra row -->
@stop
