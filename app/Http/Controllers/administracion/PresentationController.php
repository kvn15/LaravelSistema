<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Presentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.presentacion.index')->only('index');
        $this->middleware('can:admin.marca.create')->only('create','store');
        $this->middleware('can:admin.marca.edit')->only('edit','update');
        $this->middleware('can:admin.marca.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentaciones = Presentation::select('id','name','estado')
        ->selectRaw("IF(`estado` = 1 , 'Habilitado' , 'Inhabilitado') as `estadoName`")
        ->get();

        return view('pages.administracion.presentacion.index', compact('presentaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administracion.presentacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:2',
            'estado' => 'required|boolean'
        ]);

        Presentation::create($request->all());

        return redirect()->route('admin.presentacion.index')->with('mensaje', 'Se registro correctamente la Presentación');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Presentation $presentacion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentation $presentacion)
    {
        return view('pages.administracion.presentacion.edit', compact('presentacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Presentation $presentacion)
    {
        $request->validate([
            'name' => 'required|min:2',
            'estado' => 'required|boolean'
        ]);

        $presentacion->update($request->all());

        return redirect()->route('admin.presentacion.index')->with('mensaje', 'Se actualizo correctamente la Presentación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentation $presentacion)
    {
        $name = $presentacion->name;

        $presentacion->delete();

        return redirect()->route('admin.presentacion.index')->with('mensaje', 'Se elimino correctamente la Presentación '.$name);
    }
}
