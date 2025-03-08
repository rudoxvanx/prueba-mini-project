@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <!-- INICIO TABLA -->
        <div class="col py-3">
            <h3>Historiales</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Prestamo</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Equipo</th>

                    </tr>
                </thead>
                <tbody>
                    @php ($i = 0)

                    @foreach($historials as $historial)
                    @php ($i++)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$historial->fechaRegistro}}</td>
                        <td>{{$historial->estatus}}</td>
                        <td>{{$historial->prestamo_id}}</td>
                        <td>{{$historial->empleado_id}}</td>
                        <td>{{$historial->equipo_id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- FIN TABLA -->
    </div>
</div>
@endsection
