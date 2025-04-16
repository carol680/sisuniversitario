@extends('adminlte::page')

@section('content_header')
    <h1>Kelly Toledo</h1>
    <hr>
@stop

@section('content')
<div class="row">

    {{-- Gestiones --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-blue text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/calendario.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones registradas</b></span>
                <span class="info-box-number">{{ $total_gestiones }} gestiones</span>
            </div>
        </div>
    </div>

    {{-- Carreras --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-green text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/diploma.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Carreras registradas</b></span>
                <span class="info-box-number">{{ $total_carreras }} carreras</span>
            </div>
        </div>
    </div>

    {{-- Niveles --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-purple text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/grafico-de-linea.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Niveles registrados</b></span>
                <span class="info-box-number">{{ $total_niveles }} niveles</span>
            </div>
        </div>
    </div>

</div>

<div class="row">

    {{-- Materias --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-yellow text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/lista-de-verificacion.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Materias registradas</b></span>
                <span class="info-box-number">{{ $total_materias }} materias</span>
            </div>
        </div>
    </div>

    {{-- Roles --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-pink text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/roles.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Roles registrados</b></span>
                <span class="info-box-number">{{ $total_roles }} roles</span>
            </div>
        </div>
    </div>

    {{-- Administrativos --}}
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoomP pastel-mint text-dark">
            <span class="info-box-icon d-flex align-items-center justify-content-center" style="background: transparent;">
                <img src="{{ url('/img/administrativos.gif') }}" width="60px" alt="">
            </span>
            <div class="info-box-content">
                <span class="info-box-text"><b>Administrativos registrados</b></span>
                <span class="info-box-number">{{ $total_administrativos }} administrativos</span>
            </div>
        </div>
    </div>

</div>
@stop

@section('css')
<style>
    .zoomP {
        transition: transform 0.3s ease-in-out;
    }

    .zoomP:hover {
        transform: scale(1.05);
    }

    .info-box {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 10px;
    }

    .pastel-blue {
        background-color: #d0e8ff;
    }

    .pastel-green {
        background-color: #d9f9d9;
    }

    .pastel-purple {
        background-color: #e9d8fd;
    }

    .pastel-yellow {
        background-color: #fff7d6;
    }

    .pastel-pink {
        background-color: #ffe0eb;
    }

    .pastel-mint {
        background-color: #d4f4ea;
    }

    .info-box-text {
        font-weight: 600;
    }
</style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
