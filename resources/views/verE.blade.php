@extends('layouts.pastel')

@section('title', 'Inicio')

@section('content')

<div class="center">

    <h4>Datos del pastel</h4>

    <div class="form-group">
        <label for="pasteles">Tipo de pastel</label>
        <select class="form-control" id="pasteles" name="pasteles" readonly>
            @foreach($pasteles as $pastel)
            <option value='{{$pastel->_id}}'>{{$pastel->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" value="{{$descripcion->desc}}" id="descripcion" name="descripcion" readonly>
    </div>
    <div class="form-group">
        <label for="ingredientes">Ingredientes</label>
        <input type="text" class="form-control" value="{{$descripcion->ingredientes}}" id="ingredientes" name="ingredientes" readonly>
    </div>
</div>
</div>


@endsection