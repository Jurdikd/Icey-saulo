@extends('layouts.app')

@section('template_title')
    Update Parroquia
@endsection

@section('content')
<h1 class="text-center">PARROQUIA </h1>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Parroquia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('parroquias.update', $parroquia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('parroquia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
