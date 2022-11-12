@extends('layouts.app')

@section('template_title')
    {{ $solicitudCursante->name ?? 'Show Solicitud Cursante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Solicitud Cursante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('solicitud_cursante') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $solicitudCursante->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Cursante Id:</strong>
                            {{ $solicitudCursante->cursante_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
