@extends('layouts.app')

@section('template_title')
    {{ $facilitador->name ?? 'Show Facilitador' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Facilitador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facilitadors') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $facilitador->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $facilitador->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $facilitador->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $facilitador->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $facilitador->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $facilitador->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia Id:</strong>
                            {{ $facilitador->parroquia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
