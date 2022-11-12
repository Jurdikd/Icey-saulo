@extends('layouts.app')

@section('template_title')
    Aprobado
@endsection

@section('content')
<h1 class="text-center">CURSOS APROBADOS </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Aprobado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('aprobados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Descripcion</th>
										<th>Horas</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Cupos</th>
										<th>Solicitude Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aprobados as $aprobado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $aprobado->descripcion }}</td>
											<td>{{ $aprobado->horas }}</td>
											<td>{{ $aprobado->fecha_inicio }}</td>
											<td>{{ $aprobado->fecha_fin }}</td>
											<td>{{ $aprobado->cupos }}</td>
											<td>{{ $aprobado->solicitude_id }}</td>

                                            <td>
                                                <form action="{{ route('aprobados.destroy',$aprobado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('aprobados.show',$aprobado->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('aprobados.edit',$aprobado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $aprobados->links() !!}
            </div>
        </div>
    </div>
@endsection
