<?php

namespace App\Http\Controllers;


use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'name'=>'required|unique:roles',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();
        return redirect()->route('admin.roles.index')
              ->with('mensaje', 'Rol creado correctamente')
              ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);

        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);
        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();
        return redirect()->route('admin.roles.index')
              ->with('mensaje', 'Se modifica el rol correctamente')
              ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
             ->with('mensaje', 'Se elimino el rol correctamente')
              ->with('icono', 'success');
    }
    }