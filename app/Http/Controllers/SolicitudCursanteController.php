<?php

namespace App\Http\Controllers;

use App\Models\Cursante;
use App\Models\Curso;
use App\Models\Aprobado;
use App\Models\SolicitudCursante;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Class SolicitudCursanteController
 * @package App\Http\Controllers
 */
class SolicitudCursanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudCursantes = SolicitudCursante::paginate();

        return view('solicitud-cursante.index', compact('solicitudCursantes'))
            ->with('i', (request()->input('page', 1) - 1) * $solicitudCursantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitudCursante = new SolicitudCursante();
        $cursante = Cursante::all();
        $cursos= Aprobado::all();

        $date = Carbon::now()->format('Y-m-d');
        //$cuposreservados= Aprobado::where();
        //SolicitudCursante::where('curso','1')->get()->count() ESTA ES LA CANTIDAD DE RESERVAS QUE TIENE EL CURSO
        $reservas= SolicitudCursante::count()>0 ? SolicitudCursante::all() : '0';
        return view('solicitud-cursante.create', compact('solicitudCursante', 'cursante','cursos','reservas','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SolicitudCursante::$rules);

        $solicitudCursante = SolicitudCursante::create($request->all());

        return redirect()->route('solicitudes_cursante')
            ->with('success', 'SolicitudCursante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitudCursante = SolicitudCursante::find($id);

        return view('solicitud-cursante.show', compact('solicitudCursante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitudCursante = SolicitudCursante::find($id);

        return view('solicitud-cursante.edit', compact('solicitudCursante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SolicitudCursante $solicitudCursante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudCursante $solicitudCursante)
    {
        request()->validate(SolicitudCursante::$rules);

        $solicitudCursante->update($request->all());

        return redirect()->route('solicitud-cursantes.index')
            ->with('success', 'SolicitudCursante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $solicitudCursante = SolicitudCursante::find($id)->delete();

        return redirect()->route('solicitud-cursantes.index')
            ->with('success', 'SolicitudCursante deleted successfully');
    }
}
