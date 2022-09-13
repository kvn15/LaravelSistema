<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.caja.index')->only('index');
        $this->middleware('can:admin.caja.create')->only('create','store');
        $this->middleware('can:admin.caja.edit')->only('edit','update');
        $this->middleware('can:admin.caja.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajas = Caja::select('id','codigo','name','estado','importe_caja')
        ->selectRaw("IF(`estado` = 1 , 'Habilitado' , 'Inhabilitado') as `estadoName`")
        ->get();

        return view('pages.administracion.caja.index', compact('cajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administracion.caja.create');
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
            'codigo' => 'required|min:5|max:5',
            'name' => 'required',
            'estado' => 'required|boolean',
            'importe_caja' => 'required|numeric'
        ]);

        Caja::create($request->all());

        return redirect()->route('admin.caja.index')->with('mensaje','Se registro correctamente la Caja');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Caja $caja)
    {
        return view('pages.administracion.caja.edit', compact('caja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caja $caja)
    {
        $request->validate([
            'codigo' => 'required|min:5|max:5',
            'name' => 'required',
            'estado' => 'required|boolean',
            'importe_caja' => 'required|numeric'
        ]);

        $caja->update($request->all());

        return redirect()->route('admin.caja.index')->with('mensaje','Se actualizo correctamente la Caja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caja $caja)
    {   
        $name = $caja->name; 

        $caja->delete();

        return redirect()->route('admin.caja.index')->with('mensaje','Se elimino correctamente la Caja: '.$name);
    }
}
