@extends('layouts.app')

@section('template_title')
    Update Facilitador
@endsection

@section('content')
<h1 class="text-center">FACILITADOR </h1>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Facilitador</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('facilitadores.update', $facilitador->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('facilitador.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
