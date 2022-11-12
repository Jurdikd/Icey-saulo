<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $solicitude->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de solicitud']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('curso') }}
            {{ Form::select('curso_id', $curso, $solicitude->curso_id, ['class' => 'form-control' . ($errors->has('curso_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Curso']) }}
            {!! $errors->first('curso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facilitador') }}
            {{ Form::select('facilitador_id', $facilitador, $solicitude->facilitador_id, ['class' => 'form-control' . ($errors->has('facilitador_id') ? ' is-invalid' : ''), 'placeholder' => ' Selecciona un Facilitador']) }}
            {!! $errors->first('facilitador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('espacio') }}
            {{ Form::select('espacio_id', $espacio, $solicitude->espacio_id, ['class' => 'form-control' . ($errors->has('espacio_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Espacio']) }}
            {!! $errors->first('espacio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Crear</button>
    </div>
</div>