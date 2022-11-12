<?php

namespace App\Http\Controllers;

use App\Models\Cursante;
use App\Models\Parroquia;
use Illuminate\Http\Request;

/**
 * Class CursanteController
 * @package App\Http\Controllers
 */
class CursanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursantes = Cursante::paginate();

        return view('cursante.index', compact('cursantes'))
            ->with('i', (request()->input('page', 1) - 1) * $cursantes->perPage('DES'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursante = new Cursante();
        $parroquia = Parroquia::pluck('nombre', 'id');
        return view('cursante.create', compact('cursante', 'parroquia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cursante::$rules);

        $cursante = Cursante::create($request->all());

        return redirect()->route('cursantes')
            ->with('success', 'Cursante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursante = Cursante::find($id);

        return view('cursante.show', compact('cursante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursante = Cursante::find($id);
        $parroquia = Parroquia::pluck('nombre', 'id');
        return view('cursante.edit', compact('cursante', 'parroquia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cursante $cursante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursante $cursante)
    {
        request()->validate(Cursante::$rules);

        $cursante->update($request->all());

        return redirect()->route('cursantes')
            ->with('success', 'Cursante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cursante = Cursante::find($id)->delete();

        return redirect()->route('cursantes.index')
            ->with('success', 'Cursante deleted successfully');
    }
}
