@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{route('empleados.create')}}">Agregar empleado</a>
    <div class="row flex-nowrap">
        <!-- INICIO TABLA -->
        <div class="col py-3">
            <h3>Empleados</h3>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Área</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 0)

                    @foreach($empleados as $empleado)
                    @php ($i++)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->area}}</td>
                        <td>{{$empleado->correo}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->empleadoId) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->empleadoId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- FIN TABLA -->
    </div>
</div>
@endsection
