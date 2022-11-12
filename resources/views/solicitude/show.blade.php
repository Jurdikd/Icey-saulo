@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? 'Show Solicitude' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Solicitude</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('solicitudes') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $solicitude->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $solicitude->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Curso Id:</strong>
                            {{ $solicitude->curso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Facilitador Id:</strong>
                            {{ $solicitude->facilitador_id }}
                        </div>
                        <div class="form-group">
                            <strong>Espacio Id:</strong>
                            {{ $solicitude->espacio_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
