<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categoria.index')->only('index');
        $this->middleware('can:admin.categoria.create')->only('create','store');
        $this->middleware('can:admin.categoria.edit')->only('edit','update');
        $this->middleware('can:admin.categoria.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id','name','estado')
            ->selectRaw("IF(`estado` = 1 , 'Habilitado' , 'Inhabilitado') as `estadoName`")
            ->get();

        return view('pages.administracion.categoria.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administracion.categoria.create');
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
            'name' => 'required|min:5',
            'estado' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categoria.index')->with('mensaje', 'Se registro correctamente la Categoria');
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
    public function edit(Category $categorium)
    {
        return view('pages.administracion.categoria.edit', compact('categorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categorium)
    {
        $request->validate([
            'name' => 'required|min:5',
            'estado' => 'required'
        ]);

        $categorium->update($request->all());

        return redirect()->route('admin.categoria.index')->with('mensaje', 'Se actualizo correctamente la Categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorium)
    {
        $name = $categorium->name;

        $categorium->delete();

        return redirect()->route('admin.categoria.index')->with('mensaje', 'Se elemino correctamente la Categoria '.$name);
    }
}
