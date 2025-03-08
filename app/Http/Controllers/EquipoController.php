<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serie' => 'required|unique:equipos,serie',
            'estatus' => 'required|string|max:20',
        ]);

        // Obtener el último equipo registrado
        $lastEquipo = Equipo::orderBy('equipoId', 'desc')->first();

        // Si no hay equipos, el primer equipo tendrá la clave 'E-0001'
        $nextId = $lastEquipo ? (intval(substr($lastEquipo->clave, 2)) + 1) : 1;

        // Formatear la nueva clave con 4 dígitos
        $clave = 'E-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        // Crear el equipo con la clave generada
        Equipo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'serie' => $request->serie,
            'estatus' => $request->estatus,
            'clave' => $clave,  // Agregar la clave generada
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo creado exitosamente.');
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
    public function edit(string $id)
    {
        //
        $equipo = Equipo::findOrFail($id);
        return view('equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $equipo = Equipo::findOrFail($id);

        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serie' => 'required|unique:equipos,serie',
            'estatus' => 'required|string|max:20',
        ]);


        // Crear el equipo con la clave generada
       $equipo->update($request->all());

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado exitosamente.');
    }
}
