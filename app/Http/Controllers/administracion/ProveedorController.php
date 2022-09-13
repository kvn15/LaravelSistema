<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Identification;
use App\Models\Provedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.proveedor.index')->only('index');
        $this->middleware('can:admin.proveedor.index')->only('show');
        $this->middleware('can:admin.proveedor.create')->only('create','store');
        $this->middleware('can:admin.proveedor.edit')->only('edit','update');
        $this->middleware('can:admin.proveedor.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedors = Provedor::select('id','identification','name',
        'emcargado','email','estado')
        ->selectRaw("IF(`estado` = 1 , 'Habilitado' , 'Inhabilitado') as `estadoName`")
        ->get();

        return view('pages.administracion.proveedor.index', compact('provedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identifications = Identification::all()->pluck('name','id')->toArray();

        return view('pages.administracion.proveedor.create', compact('identifications'));
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
            'identifications_id' => 'required',
            'identification' => 'required|min:8|unique:provedors',
            'name' => 'required',
            'direccion' => 'required',
            'emcargado' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable|min:7'
        ]);

        Provedor::create($request->all());

        return redirect()->route('admin.proveedor.index')->with('mensaje', 'Se registro correctamente el Proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $proveedor)
    {
        $identifications = Identification::all()->pluck('name','id')->toArray();

        return view('pages.administracion.proveedor.show', compact('identifications','proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $proveedor)
    {
        $identifications = Identification::all()->pluck('name','id')->toArray();

        return view('pages.administracion.proveedor.edit', compact('identifications','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $proveedor)
    {
        $request->validate([
            'identifications_id' => 'required',
            'identification' => 'required|min:8|unique:provedors,identification,'.$proveedor->id,
            'name' => 'required',
            'direccion' => 'required',
            'emcargado' => 'required',
            'email' => 'required|email',
            'telefono' => 'nullable|min:7'
        ]);

        $proveedor->update($request->all());

        return redirect()->route('admin.proveedor.index')->with('mensaje', 'Se modifico correctamente el Proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $proveedor)
    {
        $provedor = $proveedor->name;

        $proveedor->delete();
     
        return redirect()->route('admin.proveedor.index')->with('mensaje', 'Se elimino correctamente el Proveedor '.$provedor);
    }
}
