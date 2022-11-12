<?php

namespace App\Http\Controllers;

use App\Models\Facilitador;
use App\Models\Parroquia;
use Illuminate\Http\Request;

/**
 * Class FacilitadorController
 * @package App\Http\Controllers
 */
class FacilitadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilitadors = Facilitador::paginate();

        return view('facilitador.index', compact('facilitadors'))
            ->with('i', (request()->input('page', 1) - 1) * $facilitadors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilitador = new Facilitador();
        $parroquia = Parroquia::pluck('nombre', 'id');
        return view('facilitador.create', compact('facilitador', 'parroquia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Facilitador::$rules);

        $facilitador = Facilitador::create($request->all());

        return redirect()->route('facilitadors')
            ->with('success', 'Facilitador created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facilitador = Facilitador::find($id);

        return view('facilitador.show', compact('facilitador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilitador = Facilitador::find($id);
        $parroquia = Parroquia::pluck('nombre', 'id');
        return view('facilitador.edit', compact('facilitador', 'parroquia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Facilitador $facilitador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facilitador $facilitador)
    {
        request()->validate(Facilitador::$rules);

        $facilitador->update($request->all());

        return redirect()->route('facilitadors')
            ->with('success', 'Facilitador updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facilitador = Facilitador::find($id)->delete();

        return redirect()->route('facilitadors')
            ->with('success', 'Facilitador deleted successfully');
    }
}
