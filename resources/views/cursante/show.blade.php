@extends('layouts.app')

@section('template_title')
    {{ $cursante->name ?? 'Show Cursante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cursante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursantes.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cursante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $cursante->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $cursante->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $cursante->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cursante->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $cursante->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia Id:</strong>
                            {{ $cursante->parroquia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
