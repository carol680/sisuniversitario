<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrativos = Administrativo::all();
        return view('admin.administrativos.index', compact('administrativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.administrativos.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:administrativos',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'profesion' => 'required',
            'rol' => 'required',
            'email' => 'required|email|unique:users,email' // Validamos el email
        ]);

        // Crear usuario
        $usuario = new User();
        $usuario->name = $request->nombre . " ". $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        // Asignar rol
        $usuario->assignRole($request->rol);

        // Crear administrativo
        $administrativo = new Administrativo();
        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->apellidos = $request->apellidos;
        $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
        $administrativo->ci = $request->ci;
        $administrativo->telefono = $request->telefono;
        $administrativo->direccion = $request->direccion;
        $administrativo->profesion = $request->profesion;
        $administrativo->save();

        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Personal administrativo registrado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roles = Role::all();
        $administrativo = Administrativo::find($id);
        return view('admin.administrativos.show', compact('administrativo','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $administrativo = Administrativo::find($id);
        return view('admin.administrativos.edit', compact('administrativo','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $administrativo = Administrativo::find($id);

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:administrativos,ci' .$administrativo->$id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'profesion' => 'required',
            'rol' => 'required|unique:users,email,'.$administrativo->usuario->id,
        ]);
        
        $usuario = $administrativo->usuario;//Busqueda
        $usuario->name = $request->nombre." ".$request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->apellidos = $request->apellidos;
        $administrativo->ci = $request->ci;
        $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
        $administrativo->telefono = $request->telefono;
        $administrativo->direccion = $request->direccion;
        $administrativo->profesion = $request->profesion;
        $administrativo->save();

        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Se actualizo los datos correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $administrativo = Administrativo::find($id);
        $administrativo->delete();
        $administrativo->usuario->delete();
        return redirect()->route('admin.administrativos.index')
            ->with('mensaje', 'Personal administrativo eliminado correctamente')
            ->with('icono', 'success');
    }
}