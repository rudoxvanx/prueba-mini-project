<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\Empleado;
use App\Models\Historial;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamo.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::all();
        $empleados = Empleado::all();
        return view('prestamo.create',compact('equipos','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fechaprestamo' => 'required|string',
            'fechadevolucion' => 'required|string',
            'estatus' => 'required|string|max:20',
            'observaciones' => 'required|unique:equipos,serie',
            'empleadoid' => 'required',
            'equipoid' => 'required'
        ]);

         // Obtener el último equipo registrado
         $lastPrestamo = Prestamo::orderBy('prestamoId', 'desc')->first();

         // Si no hay equipos, el primer equipo tendrá la clave 'E-0001'
         $nextId = $lastPrestamo ? (intval(substr($lastPrestamo->clavePrestamo, 2)) + 1) : 1;

         // Formatear la nueva clave con 4 dígitos
         $clave = 'P-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

         Prestamo::create([
            'clavePrestamo' => $clave,
            'fechaPrestamo' => $request->fechaprestamo,
            'fechaDevolucion' => $request->fechadevolucion,
            'estatus' => $request->estatus,
            'observaciones' => $request->observaciones,
            'empleado_id' => $request->empleadoid,
            'equipo_id' => $request->equipoid
        ]);
        return redirect()->route('prestamos.index')->with('success', 'Prestamo creado exitosamente.');
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
        $prestamo = Prestamo::findOrFail($id);
        $empleados = Empleado::all();
        $equipos = Equipo::all();
        return view('prestamo.edit', compact('prestamo','empleados','equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prestamo = Prestamo::findOrFail($id);

        $request->validate([
            'fechaprestamo' => 'required|date',
            'fechadevolucion' => 'required|date',
            'estatus' => 'required|string|max:20',
            'observaciones' => 'required',
            'empleadoid' => 'required',
            'equipoid' => 'required'
        ]);
        if ($prestamo->empleado_id != $request->empleadoid) {
            // Si el estatus no es "reasignado", mostrar un error
            if ($request->estatus !== 'reasignado') {
                return redirect()->back()->withErrors(['estatus' => 'Debe establecer el estatus como "reasignado" al cambiar el empleado.']);
            }
        }
        if( ($prestamo->empleado_id != $request->empleadoid) || ($prestamo->equipo_id != $request->equipoid) )
        {
            if( ($prestamo->equipo_id != $request->equipoid) )
            {
                $equipo_anterior = Equipo::find($prestamo->equipo_id);
                $equipo_anterior->estatus = 'disponible';
                $equipo_anterior->save();

                $equipo_actual = Equipo::find($request->equipoid);
                $equipo_actual->estatus = 'no disponible';
                $equipo_actual->save();
            }

            Historial::create([
                'fechaRegistro' => now(),
                'estatus' => $request->estatus,
                'prestamo_id' => $id,
                'empleado_id' => $request->empleadoid,
                'equipo_id' => $request->equipoid
            ]);


        }

        $prestamo->fechaPrestamo = $request->fechaprestamo;
        $prestamo->fechaDevolucion = $request->fechadevolucion;
        $prestamo->estatus = $request->estatus;
        $prestamo->observaciones = $request->observaciones;
        $prestamo->empleado_id = $request->empleadoid;
        $prestamo->equipo_id = $request->equipoid;
        $prestamo->save();

        return redirect()->route('prestamos.index')->with('success', 'Prestamo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Prestamo eliminado exitosamente.');
    }
}
