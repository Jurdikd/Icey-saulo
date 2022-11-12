@extends('layouts.app')

@section('template_title')
    {{ $espacio->name ?? 'Show Espacio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Espacio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('espacios.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $espacio->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $espacio->estatus }}
                        </div>
                        <div class="form-group">
                            <strong>Parroquia Id:</strong>
                            {{ $espacio->parroquia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
