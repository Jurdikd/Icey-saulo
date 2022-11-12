@extends('layouts.app')

@section('template_title')
    Facilitador
@endsection

@section('content')
<h1 class="text-center">FACILITADORES </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Facilitador') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('facilitadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($facilitadors as $facilitador)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $facilitador->nombre }}</td>
											<td>{{ $facilitador->apellido }}</td>
											<td>{{ $facilitador->cedula }}</td>
											<td>{{ $facilitador->fecha_nacimiento }}</td>
											<td>{{ $facilitador->telefono }}</td>
											<td>{{ $facilitador->correo }}</td>
											<td>{{ $facilitador->parroquia->nombre }}</td>

                                            <td>
                                                <form action="{{ route('facilitadores.destroy',$facilitador->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('facilitadores.show',$facilitador->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('facilitadores.edit',$facilitador->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $facilitadors->links() !!}
            </div>
        </div>
    </div>
@endsection
