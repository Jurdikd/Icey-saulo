@extends('layouts.app')

@section('template_title')
    Parroquia
@endsection

@section('content')
<h1 class="text-center">PARROQUIA </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Parroquia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('parroquias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Municipio </th>
										<th>Estado </th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parroquias as $parroquia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $parroquia->nombre }}</td>
											<td>{{ $parroquia->municipio->nombre }}</td>
											<td>{{ $parroquia->municipio->estado->nombre }}</td>

                                            <td>
                                                <form action="{{ route('parroquias.destroy',$parroquia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('parroquias.show',$parroquia->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('parroquias.edit',$parroquia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $parroquias->links() !!}
            </div>
        </div>
    </div>
@endsection
