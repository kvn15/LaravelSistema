<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.marca.index')->only('index');
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
        $marcas = Brand::select('id','name','estado')
        ->selectRaw("IF(`estado` = 1 , 'Habilitado' , 'Inhabilitado') as `estadoName`")
        ->get();


        return view('pages.administracion.marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('pages.administracion.marca.create');
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

        Brand::create($request->all());

        return redirect()->route('admin.marca.index')->with('mensaje', 'Se registro correctamente la Marca');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $marca)
    {
        return view('pages.administracion.marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $marca)
    {
        $request->validate([
            'name' => 'required|min:2',
            'estado' => 'required|boolean'
        ]);

        $marca->update($request->all());

        return redirect()->route('admin.marca.index')->with('mensaje', 'Se actualizo correctamente la Marca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $marca)
    {
        $name = $marca->name;

        $marca->delete();

        return redirect()->route('admin.marca.index')->with('mensaje', 'Se elimino correctamente la Marca '.$name);
    }
}
