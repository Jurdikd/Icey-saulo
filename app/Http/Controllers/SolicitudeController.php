<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Espacio;
use App\Models\Aprobado;
use App\Models\Facilitador;
use App\Models\Solicitude;
use Illuminate\Http\Request;

/**
 * Class SolicitudeController
 * @package App\Http\Controllers
 */
class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitude::where('estatus',0)->paginate();

        return view('solicitude.index', compact('solicitudes'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitudes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitude = new Solicitude();
        $curso = Curso::pluck('nombre', 'id');
        $facilitador = Facilitador::pluck('nombre', 'id');
        $espacio = Espacio::pluck('direccion', 'id');
        return view('solicitude.create', compact('solicitude', 'curso', 'facilitador', 'espacio'));
    }
    public function aprobar_solicitud(Request $request, $solicitud){

$solicitude_id= $solicitud;

$solicitude= Solicitude::where('id',$solicitude_id)->get();
//dd($solicitude);
return view('aprobado.form',compact('solicitude'));


    }

    public function formalizarSolicitud(Request $request){
        //dd($request);
        Aprobado::create([
            'descripcion' => $request->descripcion,
            'horas' => $request->horas,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'cupos' => $request->cupos,
            'solicitude_id' => $request->solicitud_id
        ]);

        //Solicitude::where('id',$request->solicitud_id)->update('status','1');

        $solicitud = Solicitude::find($request->solicitud_id);
 
        $solicitud->estatus = '1';
        
        $solicitud->save();
        return redirect()->route('aprobados')->with('success','La solicitud se aprobó con éxito');
//Guardar registro en tabla aprobados
//actualizar valor booleano donde id de la solicitud es igual a X
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Solicitude::$rules);

        $solicitude = Solicitude::create($request->all());

        return redirect()->route('solicitude')
            ->with('success', 'Solicitude created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitude = Solicitude::find($id);

        return view('solicitude.show', compact('solicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitude = Solicitude::find($id);
        $curso = Curso::pluck('nombre', 'id');
        $facilitador = Facilitador::pluck('nombre', 'id');
        $espacio = Espacio::pluck('direccion', 'id');
        return view('solicitude.edit', compact('solicitude', 'curso', 'facilitador', 'espacio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitude $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        request()->validate(Solicitude::$rules);

        $solicitude->update($request->all());

        return redirect()->route('solicitudes')
            ->with('success', 'Solicitude updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $solicitude = Solicitude::find($id)->delete();

        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitude deleted successfully');
    }
}
