<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:config.user.index')->only('index');
        $this->middleware('can:config.user.create')->only('create','store');
        $this->middleware('can:config.user.edit')->only('edit','update','editv2','updatev2');
        $this->middleware('can:config.user.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('pages.configuracion.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $person = Person::select('id')
                    ->selectRaw("CONCAT(`nombres`,' ',`apellidos`) as `persona`")
                    ->pluck('persona','id')->toArray();

        return view('pages.configuracion.user.create', compact('person'));
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
            'nameUser' => 'required|min:5|unique:users',
            'name' => 'required|min:5',
            'password' => 'required|confirmed|min:6',
            'person_id' => 'required'
        ]);

        User::create([
            'nameUser' => $request->nameUser,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'person_id' => $request->person_id
        ]);

        return redirect()->route('config.user.index')->with('mensaje','Se creo un nuevo usuario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //
    public function editv2(User $user)
    {
        $roles = Role::all();

        return view('pages.configuracion.user.asignar', compact('user','roles'));
    }

    //
    public function updatev2(Request $request,User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('config.user.role', $user)->with('mensaje', 'Se asignó los roles correctamente');
    }

}
