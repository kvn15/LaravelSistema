<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Identification;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.cliente.index')->only('index');
        $this->middleware('can:admin.cliente.index')->only('show');
        $this->middleware('can:admin.cliente.create')->only('create','store');
        $this->middleware('can:admin.cliente.edit')->only('edit','update');
        $this->middleware('can:admin.cliente.destroy')->only('destroy');
    }

    public function index()
    {
        $clients = Client::all();

        return view('pages.administracion.clientes.index', compact('clients'));
    }

    public function create()
    {

        $identification = Identification::all();

        return view('pages.administracion.clientes.create', compact('identification'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:160',
            'last_name' => 'required|min:3|max:160',
            'identifications_id' => 'required|',
            'identification' => 'required|min:8|max:12|unique:clients',
            'email' => 'required|email',
            'telefono' => 'nullable|min:9|max:15',
            'direccion' => 'required'
        ]);

        Client::create($request->all());

        return redirect()->route('admin.cliente.index')->with('mensaje', 'Se creo un nuevo cliente');
    }

    public function edit(Client $cliente)
    {
        $identification = Identification::all()->pluck('name','id')->toArray();

        return view('pages.administracion.clientes.edit', compact('cliente','identification'));
    }

    public function update(Request $request,Client $cliente)
    {
        $request->validate([
            'name' => 'required|min:3|max:160',
            'last_name' => 'required|min:3|max:160',
            'identifications_id' => 'required|',
            'identification' => 'required|min:8|max:12|unique:clients,identification,'.$cliente->id,
            'email' => 'required|email',
            'telefono' => 'nullable|min:9|max:15',
            'direccion' => 'required'
        ]);

        $cliente->update($request->all());

        return redirect()->route('admin.cliente.index')->with('mensaje', 'Se modifico correctamente el cliente');
    }

    public function destroy(Client $cliente)
    {
        $cliente->delete();

        return redirect()->route('admin.cliente.index')->with('mensaje', 'Se elimino correctamente el cliente');
    }

    public function show(Client $cliente)
    {
        $identification = Identification::all()->pluck('name','id')->toArray();

        return view('pages.administracion.clientes.show', compact('cliente','identification'));
    }
}
