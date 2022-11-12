@extends('layouts.app')

@section('template_title')
    Solicitude
@endsection

@section('content')


<h1 class="text-center">FORMALIZACION DE LA SOLICITUD</h1>


<form action="{{route('formalizar_solicitud')}}" method="post">

@csrf 
@method('post')

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($solicitude as $solicitudes)

                    <h3>Nombre del solicitante: {{$solicitudes->facilitador->nombre }}</h3> 

                             <h3>
                    Nombre del curso solicitado: {{$solicitudes->curso->nombre}}
                        </h3>

                    <h3>Espacio solicitado para el curso: {{$solicitudes->espacio->direccion}}</h3>
                             @endforeach
            </div>
        </div>
<div class="card">
    <div class="card-header">
        <span id="card_title">
            {{ __('Formalización de la solicitud') }}
        </span>
    </div>
    <div class="card-body">

    <div class="row">
        <div class="">
            <label for="descripcion"> Descripcion</label>
            <input type="textarea" class="form-control" name="descripcion">
        </div>
    </div>

    <div class="row">
        <div class="">
            <label for="horas">Cantidad de Horas</label>
            <input type="number" class="form-control" name="horas">
        </div>
    </div>

    <div class="row">

        <div class="">
            <label for="fecha_inicio">Fecha de inicio</label>

            <input type="date" class="form-control" name="fecha_inicio">
        </div>
    </div>

    <div class="row">
        <div class="">
            <label for="fecha_fin">Fecha de finalización</label>
            <input type="date" class="form-control" name="fecha_fin">
        </div>
    </div>

    <div class="row">
        
        <div class="">
            <label for="cupos">Cantidad de cupos</label>
            <input type="number" class="form-control" name="cupos">
        </div>
    </div>
    <input type="hidden" name="solicitud_id" value="{{$solicitude[0]->id}}">
        
            
            <div class="box-footer pt-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
    </div>
</div>
   

</form>

</div>
@endsection