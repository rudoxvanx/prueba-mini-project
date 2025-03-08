@extends('layouts.app')

@section('content')
<h3>Crear un empleado</h3>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="row g-3" method="POST" action="{{route('empleados.store')}}">
    @csrf <!-- {{ csrf_field() }} -->

    <div class="col-md-6">
        <label for="" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Área</label>
        <input type="text" class="form-control" name="area" value="{{ old('area') }}">
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Correo</label>
        <input type="email" class="form-control" name="correo" value="{{ old('correo') }}">
    </div>
    <div class="col-6">
        <label for="" class="form-label">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
    </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

@endsection
