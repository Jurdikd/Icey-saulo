<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\Parroquia;
use Illuminate\Http\Request;

/**
 * Class EspacioController
 * @package App\Http\Controllers
 */
class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacios = Espacio::paginate();

        return view('espacio.index', compact('espacios'))
            ->with('i', (request()->input('page', 1) - 1) * $espacios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espacio = new Espacio();
        $parroquia = Parroquia::pluck('nombre', 'id');

        return view('espacio.create', compact('espacio', 'parroquia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Espacio::$rules);

        $espacio = Espacio::create($request->all());

        return redirect()->route('espacios')
            ->with('success', 'Espacio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $espacio = Espacio::find($id);

        return view('espacio.show', compact('espacio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $espacio = Espacio::find($id);

        return view('espacio.edit', compact('espacio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Espacio $espacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacio $espacio)
    {
        request()->validate(Espacio::$rules);

        $espacio->update($request->all());

        return redirect()->route('espacios')
            ->with('success', 'Espacio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $espacio = Espacio::find($id)->delete();

        return redirect()->route('espacios.index')
            ->with('success', 'Espacio deleted successfully');
    }
}
