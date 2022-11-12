@extends('layouts.app')

@section('template_title')
    Solicitude
@endsection

@section('content')
<h1 class="text-center">SOLICITUDES </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Solicitudes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('solicitudes_facilitador.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha</th>
										<th>Curso</th>
										<th>Facilitador</th>
										<th>Espacio</th>
                                        <th>Estatus</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudes as $solicitude)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $solicitude->fecha }}</td>
											<td>{{ $solicitude->curso->nombre }}</td>
											<td>{{ $solicitude->facilitador->nombre }}</td>
											<td>{{ $solicitude->espacio->direccion }}</td>
                                            <td>{{ $solicitude->estatus ? 'Aprobado' : 'Pendiente'}}</td>

                                            <td>
                                                <form action="{{ route('solicitudes_facilitador.destroy',$solicitude->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('solicitudes_facilitador.show',$solicitude->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('solicitudes_facilitador.edit',$solicitude->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                   
                                                </form>

                                                <a href="{{route('aprobar_solicitud', $solicitude->id)}}">APROBAR SOLICITUD</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $solicitudes->links() !!}
            </div>
        </div>
    </div>
@endsection
