@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <a href="{{route('prestamos.create')}}">Agregar un prestamo</a>
    <div class="row flex-nowrap">
        <!-- INICIO TABLA -->
        <div class="col py-3">
            <h3>Prestamos</h3>
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
                        <th scope="col">Clave</th>
                        <th scope="col">Fecha prestamo</th>
                        <th scope="col">Fecha devolución</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 0)

                    @foreach($prestamos as $prestamo)
                    @php ($i++)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$prestamo->clavePrestamo}}</td>
                        <td>{{$prestamo->fechaPrestamo}}</td>
                        <td>{{$prestamo->fechaDevolucion}}</td>
                        <td>{{$prestamo->estatus}}</td>
                        <td>{{$prestamo->observaciones}}</td>
                        <td>{{$prestamo->empleado_id}}</td>
                        <td>{{$prestamo->equipo_id}}</td>
                        <td>
                            <a href="{{ route('prestamos.edit', $prestamo->prestamoId) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('prestamos.destroy', $prestamo->prestamoId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este prestamo?')">Eliminar</button>
                            </form>
                            <a href="{{ route('historials.show', $prestamo->prestamoId) }}" class="btn btn-info btn-sm">Historial</a>
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
