<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;



use App\Models\Parroquia;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\Request;

/**
 * Class ParroquiaController
 * @package App\Http\Controllers
 */
class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parroquias = Parroquia::paginate();

        return view('parroquia.index', compact('parroquias'))
            ->with('i', (request()->input('page', 1) - 1) * $parroquias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parroquia = new Parroquia();
        //pasarle la inforrmacion de la tabla estado
        $municipio = Municipio::pluck('nombre', 'id');
        $estado = Estado::pluck('nombre', 'id');
        return view('parroquia.create', compact('parroquia', 'municipio', 'estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Parroquia::$rules);

        $parroquia = Parroquia::create($request->all());

        return redirect()->route('parroquias')
            ->with('success', '¡Parroquia creada correctamente!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parroquia = Parroquia::find($id);

        return view('parroquia.show', compact('parroquia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parroquia = Parroquia::find($id);
        $municipio = Municipio::pluck('nombre', 'id');
        $estado = Estado::pluck('nombre', 'id');

        return view('parroquia.edit', compact('parroquia','municipio','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Parroquia $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parroquia $parroquia)
    {
        request()->validate(Parroquia::$rules);

        $parroquia->update($request->all());

        return redirect()->route('parroquias')
            ->with('success', 'Parroquia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $parroquia = Parroquia::find($id)->delete();

        return redirect()->route('parroquias')
            ->with('success', '¡Parroquia eliminada correctamente!');
    }
}
