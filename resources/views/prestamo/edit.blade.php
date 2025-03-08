@extends('layouts.app')

@section('content')
<h3>Editar un prestamo</h3>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form class="row g-3" method="POST" action="{{route('prestamos.update',$prestamo->prestamoId)}}">
    @csrf <!-- {{ csrf_field() }} -->
    @method('PUT')
    <div class="col-md-6">
        <label for="" class="form-label">Fecha prestamo</label>
        <input type="date" class="form-control" name="fechaprestamo" value="{{ old('fechaprestamo',$prestamo->fechaPrestamo) }}">
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Fecha devolución</label>
        <input type="date" class="form-control" name="fechadevolucion" value="{{ old('fechadevolucion',$prestamo->fechaDevolucion) }}">
    </div>
    <div class="col-6">
        <label for="" class="form-label">Estatus</label>
        <select class="form-control" name="estatus" value="{{ old('estatus',$prestamo->estatus) }}">
            <option value="" disabled>seleccione un estatus</option>
            <option value="prestado">Prestado</option>
            <option value="devuelto">Devuelto</option>
            <option value="reasignado">Reasignado</option>
        </select>
    </div>
    <div class="col-6">
        <label for="" class="form-label">Observaciones</label>
        <input type="text" class="form-control" name="observaciones" value="{{ old('observaciones',$prestamo->observaciones) }}">
    </div>

    <div class="col-6">
        <label for="" class="form-label">Empleado</label>
        <select class="form-control" name="empleadoid" value="{{ old('empleadoid',$prestamo->empleado_id) }}">
            <option value="" disabled>seleccione un empleado</option>
            @foreach ($empleados as $empleado)
                <option value="{{$empleado->empleadoId}}">{{$empleado->nombre}}</option>
            @endforeach
        </select>
    </div>


    <div class="col-6">
        <label for="" class="form-label">Equipo</label>
        <select class="form-control" name="equipoid" value="{{ old('equipoid',$prestamo->equipo_id) }}">
            <option value="" disabled>seleccione un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{$equipo->equipoId}}">{{$equipo->clave}}</option>
            @endforeach
        </select>
    </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>
@endsection
