<?php

namespace App\Http\Controllers;

use App\Models\Aprobado;
use App\Models\Facilitador;
use App\Models\Solicitude;
use Illuminate\Http\Request;

/**
 * Class AprobadoController
 * @package App\Http\Controllers
 */
class AprobadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprobados = Aprobado::paginate();

        return view('aprobado.index', compact('aprobados'))
            ->with('i', (request()->input('page', 1) - 1) * $aprobados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $aprobado = new Aprobado();
 
        $solicitude = Solicitude::pluck('id');
       $facilitador = Facilitador::pluck('id', 'nombre');
       return view('aprobado.create', compact('aprobado', 'solicitude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Aprobado::$rules);

        $aprobado = Aprobado::create($request->all());

        return redirect()->route('aprobados.index')
            ->with('success', 'Aprobado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aprobado = Aprobado::find($id);

        return view('aprobado.show', compact('aprobado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aprobado = Aprobado::find($id);

        return view('aprobado.edit', compact('aprobado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aprobado $aprobado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aprobado $aprobado)
    {
        request()->validate(Aprobado::$rules);

        $aprobado->update($request->all());

        return redirect()->route('aprobados.index')
            ->with('success', 'Aprobado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aprobado = Aprobado::find($id)->delete();

        return redirect()->route('aprobados.index')
            ->with('success', 'Aprobado deleted successfully');
    }
}
