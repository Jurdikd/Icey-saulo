@extends('layouts.app')

@section('template_title')
    Cursante
@endsection

@section('content')
<h1 class="text-center">CURSANTES </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cursante') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cursantes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Cedula</th>
										<th>Fecha Nacimiento</th>
										<th>Telefono</th>
										<th>Correo</th>
										<th>Parroquia</th>
										<th>Opciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cursantes as $cursante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cursante->nombre }}</td>
											<td>{{ $cursante->apellido }}</td>
											<td>{{ $cursante->cedula }}</td>
											<td>{{ $cursante->fecha_nacimiento }}</td>
											<td>{{ $cursante->telefono }}</td>
											<td>{{ $cursante->correo }}</td>
											<td>{{ $cursante->parroquia->nombre }}</td>

                                            <td>
                                                <form action="{{ route('cursantes.destroy',$cursante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cursantes.show',$cursante->id) }}"><i class="fa fa-fw fa-eye"></i>Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cursantes.edit',$cursante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cursantes->links() !!}
            </div>
        </div>
    </div>
@endsection
