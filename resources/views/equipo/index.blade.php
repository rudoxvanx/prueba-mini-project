@extends('layouts.app')

@section('content')
<div class="container-fluid">
<a href="{{route('equipos.create')}}">Agregar equipo</a>
    <div class="row flex-nowrap">
        <!-- INICIO TABLA -->
        <div class="col py-3">
            <h3>Equipos</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i = 0)

                    @foreach($equipos as $equipo)
                    @php ($i++)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$equipo->clave}}</td>
                        <td>{{$equipo->marca}}</td>
                        <td>{{$equipo->modelo}}</td>
                        <td>{{$equipo->serie}}</td>
                        <td>{{$equipo->estatus}}</td>
                        <td>
                            <a href="{{ route('equipos.edit', $equipo->equipoId) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('equipos.destroy', $equipo->equipoId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">Eliminar</button>
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
