@extends('layouts.app')

@section('content')
<h3>Crear un equipo</h3>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="row g-3" method="POST" action="{{route('equipos.store')}}">
    @csrf <!-- {{ csrf_field() }} -->

    <div class="col-md-6">
        <label for="" class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca" value="{{ old('marca') }}">
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Modelo</label>
        <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}">
    </div>
    <div class="col-md-6">
        <label for="" class="form-label">Serie</label>
        <input type="text" class="form-control" name="serie" value="{{ old('serie') }}">
    </div>
    <div class="col-6">
        <label for="" class="form-label">Estatus</label>
        <select class="form-control" name="estatus" value="{{ old('estatus') }}">
            <option value="" disabled>seleccione un estatus</option>
            <option value="disponible">Disponible</option>
            <option value="no disponible">No disponible</option>
        </select>
    </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

@endsection
