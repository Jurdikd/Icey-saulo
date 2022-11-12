@extends('layouts.app')

@section('template_title')
    {{ $aprobado->name ?? 'Show Aprobado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Cursos Aprobado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aprobados.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $aprobado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Horas:</strong>
                            {{ $aprobado->horas }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $aprobado->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $aprobado->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Cupos:</strong>
                            {{ $aprobado->cupos }}
                        </div>
                        <div class="form-group">
                            <strong>Solicitude Id:</strong>
                            {{ $aprobado->solicitude_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
