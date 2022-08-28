<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::select('id','nombres','apellidos','estado')
                    ->selectRaw("IF(`estado` = 1 , 'Active' , 'Inactivo') as `estadoName`")
                    ->orderBy('id','desc')
                    ->get();

        return view('pages.administracion.personal.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administracion.personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'nombres' => 'required|max:250',
            'apellidos' => 'required|max:250',
            'sexo' => 'required',
            'correo' => 'nullable|email',
            'telefono' => 'nullable|integer',
            'direccion' => 'nullable|max:250',
        ]);

        $person = Person::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'sexo' => $request->sexo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'estado' => 1
        ]);

        return redirect()->route('admin.personal.index')->with('mensaje', 'Se creo un nuevo personal');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $personal)
    {
        return view('pages.administracion.personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $personal)
    {
        $validation = $request->validate([
            'nombres' => 'required|max:250',
            'apellidos' => 'required|max:250',
            'sexo' => 'required',
            'correo' => 'nullable|email',
            'telefono' => 'nullable|integer',
            'direccion' => 'nullable|max:250',
        ]);

        $personal->update($request->all());

        return redirect()->route('admin.personal.index')->with('mensaje', 'Se Actualizo el Personal '.$personal->nombres);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $personal)
    {
        $nombre = $personal->nombres;

        $personal->delete();

        return redirect()->route('admin.personal.index')->with('mensaje', 'Se Elimino el Personal '.$nombre);
    }
}
