
<form action="{{route('solicitud_cursante.store')}}" method="post">
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="curso"> Selecciona un curso para inscribirte</label>
            <select class="form-control" name="curso" id="curso">
                @foreach($cursos as $curso)
                    

                @if($reservas[0])
                    @if($curso->cupos - count($reservas) == 0)
                    @else
                        @if($curso->fecha_inicio <= $date)    
                        @else
                            <option value="{{$curso->id}}">
                                
                                {{$curso->fecha_inicio}} - {{$curso->descripcion}} - @if($reservas[0])
                                    @for($i=1; $i <= count($reservas); $i++)
                                        @if($reservas[$i-1]->curso == $curso->id)
                                                Cupos disponibles {{$curso->cupos - $i}}
                                        @endif
                                    @endfor
                                @endif
                            </option>
                        @endif
                        
                    @endif
                @else
                    @if($curso->fecha_inicio <= $date)    
                        @else
                        <option value="{{$curso->id}}">{{$curso->fecha_inicio}} - {{$curso->descripcion}} - Cupos disponibles: {{$curso->cupos}}</option>
                    @endif
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('cursante_id') }}
            {{ Form::text('cursante_id', $solicitudCursante->cursante_id, ['class' => 'form-control' . ($errors->has('cursante_id') ? ' is-invalid' : ''), 'placeholder' => 'Cursante Id']) }}
            {!! $errors->first('cursante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

</form>