@extends('layouts.app')

@section('template_title')
    Solicitud Cursante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Solicitud Cursante') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('solicitud_cursante.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Cursante Id</th>
                                        <th>Curso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudCursantes as $solicitudCursante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $solicitudCursante->cursante->nombre }}</td>
                                            <td>
                                                {{$solicitudCursante->cursoSolicitado->nombre}}
                                            </td>
                                            <td>
                                                <form action="{{ route('solicitud_cursante.destroy',$solicitudCursante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('solicitud_cursante.show',$solicitudCursante->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('solicitud_cursante.edit',$solicitudCursante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $solicitudCursantes->links() !!}
            </div>
        </div>
    </div>
@endsection
